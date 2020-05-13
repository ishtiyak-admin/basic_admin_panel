<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\CommonController;
use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\GlobalSetting;
use App\Models\PasswordReset;
use Redirect;
use Hash;
use Validator;
use Auth;
use Session;
use Cookie;
use View;

class HomeController extends CommonController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    public function __construct(){
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index(){
        $users         =   Users::where("status",1)->where("is_delete",0)->where("role_id",2)->get();
        return view('backend.index',compact('users'));
    }

    public function logout(){
        Auth::guard('admins')->logout();
        return redirect()->to('admin/login');
    }

    public function login(Request $request){
        if($request->isMethod('post')){
            $validator = Validator::make($request->all(), [
                'email' => 'required|email',
                'password' => 'required',
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
            }
            $email          =   $request['email'];
            $password       =   $request['password'];
            $remember_me    =   $request['remember'] ? true : false;

            $user_data      =   Users::where("email",$email)->where("status",1)->where("is_delete",0)->whereRaw("(role_id = 1 OR role_id = 5)")->first();
            if(!empty($user_data)){
                if(Hash::check($password,$user_data->password)){    
                    Auth::guard('admins')->attempt(["email"=>$email,"password"=>$password],$remember_me);
                    toastr()->success('Logged in Successfully');
                    return redirect()->to("admin");
                }else{
                    return redirect()->back()->withInput()->withErrors( [ "password" => ["Password is incorrect"] ] );
                }
            }else{
                return redirect()->back()->withInput()->withErrors( [ "email" => ["Email is invalid"] ] );
            }
        }else{
            return view('backend.auth.login');
        }
    }
    
    public function forgot_password(Request $request){
        if($request->isMethod('post')){
            $validator = Validator::make($request->all(), [
                'email' => 'required|email',
            ]);
            if ($validator->fails()) { return redirect()->back()->withInput()->withErrors($validator); }
            $email      =   $request['email'];
            $password   =   $request['password'];
            $user_data  =   Users::where("email",$email)->where("status",1)->where("is_delete",0)->first();
            if(!empty($user_data)){
                $otp    =   rand(111111,999999);
                $token  =   base64_encode($otp);
                $password_reset     =   PasswordReset::where("email",$email)->first();
                if(empty($password_reset)){
                    $password_reset             =   new PasswordReset();
                }
                $password_reset->email      =   $email;
                $password_reset->token      =   $token;
                $password_reset->save();
                $reset_pass_link    =   url("/admin/reset_password")."/".$token;
                $content    =   array("username" => "Admin", "link" => $reset_pass_link);
                $options    =   [
                                    "to_name"   =>  $user_data->name,
                                    "to_email"  =>  $user_data->email,
                ];
                $this->mail_send('admin-forgot-password',$subject=array(),$content,$options);
                Session::flash('success', 'Please check email for password reset link');
                return redirect()->to("admin/login");
            }else{
                return redirect()->back()->withInput()->withErrors( [ "email" => ["Email is invalid"] ] );
            }
        }else{
            return view('backend.auth.forgot_password');
        }
    }

    public function reset_password($slug,Request $request){
        $reset_data         =   PasswordReset::where("token",$slug)->first();
        if(!empty($reset_data)){
            $email      =   $reset_data->email;
            $to_time    =   strtotime($reset_data->updated_at);
            $from_time  =   strtotime(date("Y-m-d H:i:s"));
            $time_diff  =   round(abs($from_time - $to_time) / 60,2);
            if($time_diff <= 15){
                if($request->isMethod('post')){
                    $messages = [
                        'same' => "Password and Confirm password didn't match.",
                        'regex' => "Your password must be more than 6 characters long, should contain at-least 1 Uppercase, 1 Lowercase, 1 Numeric and 1 special character."
                    ];
                    $validator = Validator::make($request->all(), [
                        'password'          =>  'required|min:6|max:55|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
                        'confirm_password'  =>  'required|same:password|min:6|max:55',
                    ],$messages);
                    if ($validator->fails()) {
                        return redirect()->back()->withInput()->withErrors($validator);
                    }
                    $password       =   $request['password'];
                    $user_data      =   Users::where("email",$email)->where("status",1)->where("is_delete",0)->first();
                    if(!empty($user_data)){
                        $update_data    =   [ "password"  =>  Hash::make($password) ];
                        Users::where("email",$email)->update($update_data);
                        PasswordReset::where("token",$slug)->delete();
                        Session::flash('success', 'Password Reset successfully. Login to continue.');
                        return redirect()->to("admin/login");
                    }else{
                        return redirect()->back()->withInput()->withErrors( [ "email" => ["Email is invalid"] ] );
                    }
                }else{
                    $user_data  =   Users::where("email",$reset_data->email)->where("status",1)->where("is_delete",0)->first();
                    if(!empty($user_data)){
                        return view('backend.auth.reset_password',compact('slug'));
                    }else{
                        Session::flash('error', 'Invalid User');
                        return redirect()->to("admin/login");
                    }
                }
            }else{
                Session::flash('error', 'Link Expired');
                return redirect()->to("admin/login");
            }
        }else{
            Session::flash('error', 'Link Expired');
            return redirect()->to("admin/login");
        }
    }

    public function profile_update(Request $request){
        if($request->isMethod('post')){
            $messages = [
                'first_name.regex' => "The :attribute may only contain letters, numbers and spaces.",
                'last_name.regex' => "The :attribute may only contain letters, numbers and spaces.",
            ];
            $rules      =   [
                'first_name'    =>  'required|min:3|max:55|regex:/^[a-zA-Z0-9\s]+$/',
                'last_name'     =>  'required|min:3|max:55|regex:/^[a-zA-Z0-9\s]+$/',
                'email'         =>  'required|email|min:6|max:55',
                'image'         =>  'mimes:jpeg,jpg,png,gif,JPEG,JPG,PNG,GIF|max:100000' // max 10000kb
            ];
            if(!empty($request['mobile_number'])){
                $rules['mobile_number']     =   "required|unique:users,mobile_number,".Auth::guard('admins')->user()->id;
            }
            $validator = Validator::make($request->all(),$rules,$messages);
            if ($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
            }
            /* Emoji Block Work Start */
            $emojy_errors   =   [];
            $has_emojis_old =   has_emojis_old( $request['first_name'] );
            if($has_emojis_old){ $emojy_errors["first_name"]   =  ["The first name field should not contain emojis"];  }
            $has_emojis_old =   has_emojis_old( $request['last_name'] );
            if($has_emojis_old){ $emojy_errors["last_name"]   =  ["The last name field should not contain emojis"];  }
            if(!empty($emojy_errors)){
                return redirect()->back()->withInput()->withErrors($emojy_errors);
            }
            /* Emoji Block Work End */
            $user_data                  =   Users::find(Auth::guard('admins')->user()->id);
            $user_data->first_name      =   $request['first_name'];
            $user_data->last_name       =   $request['last_name'];
            $user_data->name            =   $request['first_name']." ".$request['last_name'];
            $user_data->dob             =   ($request['date_of_birth'])? $request['date_of_birth']: null;
            $user_data->gender          =   $request['gender'];
            $user_data->email           =   $request['email'];
            $user_data->mobile_number   =   $request['mobile_number'];
            if ($request->hasFile('image')) {
                if($user_data->image){
                    $image_url  =   public_path('/uploads/user_images').'/'.$user_data->image;
                    unlink($image_url);
                }
                $image          =   $request->file('image');
                $name           =   time().'.'.$image->getClientOriginalExtension();
                $destinationPath=   public_path('/uploads/user_images');
                $image->move($destinationPath, $name);
                $user_data->image   =   $name;
            }
            $user_data->save();
            toastr()->success("Profile Updated Successfully");
            return redirect()->to("admin/profile_update");
        }else{
            $record     =   Auth::guard('admins')->user();
            return view('backend/profile',compact('record'));
        }
    }

    public function change_password(Request $request){
        if($request->isMethod('post')){
            $messages = [
                'same' => "Password and Confirm password didn't match.",
                'regex' => "Your password must be more than 6 characters long, should contain at-least 1 Uppercase, 1 Lowercase, 1 Numeric and 1 special character."
            ];
            $validator = Validator::make($request->all(), [
                'old_password'      =>  'required|min:6|max:55',
                'new_password'      =>  'required|min:6|max:55|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
                'confirm_password'  =>  'required|same:new_password|min:6|max:55',
            ],$messages);
            if ($validator->fails()) {
                Session::flash("password","Password Form");
                return redirect()->back()->withInput()->withErrors($validator);
            }
            $old_password       =   $request['old_password'];
            $new_password       =   $request['new_password'];
            $user_data          =   Auth::guard('admins')->user();
            if(Hash::check($old_password,$user_data->password)){
                $user_data              =   Users::find($user_data->id);
                $user_data->password    =   Hash::make($request['new_password']);
                $user_data->save();
                Session::flash("password","Password Form");
                toastr()->success("Password Changed Successfully");
                return redirect()->to("admin/profile_update");
            }else{
                Session::flash("password","Password Form");
                return redirect()->back()->withErrors(['old_password'=>["Old Password do not match"]]);
            }
        }else{
            $record     =   Auth::guard('admins')->user();
            return view('backend/profile',compact('record'));
        }
    }

    public function global_settings(Request $request){
        if($request->isMethod('post')){
            $id     =   $request['id'];
            $value  =   $request['value'];
            GlobalSetting::where("id",$id)->update(['value' => $value]);
            echo "success";
        }else{
            $records     =   GlobalSetting::where("status",1)->where("is_delete",0)->get();
            return view('backend/global_settings',compact('records'));
        }
    }

}
