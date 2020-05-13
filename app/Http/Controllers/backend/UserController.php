<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\CommonController;
use Illuminate\Http\Request;
use App\Models\Users;
use Redirect;
use Hash;
use Validator;
use Auth;
use Session;

class UserController extends CommonController{

    protected $table        =   'users';
    protected $slug         =   'users';
    protected $page_title   =   'User';
    protected $role_id      =   2;
    protected $pagination   =   10;
    
    public function __construct(){
        view()->share('table', $this->table);
        view()->share('slug', $this->slug);
        view()->share('page_title', $this->page_title);
        view()->share('base_url', url('admin').'/'.$this->slug);
    }

    public function index(Request $request){
        $orderBy        =   ($request['orderBy'])? $request['orderBy'] : 'id';
        $order          =   ($request['order'])? $request['order'] : 'desc';
        $search_form    =   ["name","email","mobile_number","status"];
        $query          =   Users::select("*");
        $counter        =   ( ( ($request['page'])? $request['page'] : 1 ) -1 )*$this->pagination;
        if(!empty($search_form)){
            foreach($search_form as $key => $value){
                if($value == "status"){
                    if($request[$value] != 'all' && !empty($request[$value])){ $query->where($value,($request[$value]=="active"? 1 : 0)); }
                }else if(!empty($request[$value])){ $query->where($value,"like","%$request[$value]%"); }
            }
        }
        $query->where("is_delete",0)->where("role_id",$this->role_id)->orderBy($orderBy,$order);
        $total_records  =   $query->count();
        $records        =   $query->paginate($this->pagination);
        return view('backend.'.$this->slug.'.index',compact('counter','records'));
    }

    public function view($id,Request $request){
        $record    =   Users::where("id",base64_decode($id))->first();
        if(!empty($record)){
            return view('backend.'.$this->slug.'.view',compact('record'));
        }else{
            toastr()->error("Wrong Url");
            return redirect()->back();
        }
    }

    /** Creates Slug from Given Text **/
    public static function slugify($text){
        // replace non letter or digits by -
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);
        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);
        // trim
        $text = trim($text, '-');
        // remove duplicate -
        $text = preg_replace('~-+~', '-', $text);
        // lowercase
        $text = strtolower($text);
        if (empty($text)) {
            return 'n-a';
        }
        return $text;
    }

    public function create(Request $request){
        if($request->isMethod('post')){
            $messages = [
                'password.same' => "Password and Confirm password didn't match.",
                'password.regex' => "Your password must be more than 6 characters long, should contain at-least 1 Uppercase, 1 Lowercase, 1 Numeric and 1 special character.",
                'first_name.regex' => "The :attribute may only contain letters, numbers and spaces.",
                'last_name.regex' => "The :attribute may only contain letters, numbers and spaces.",
                'mobile_number.regex' => "The :attribute may only contain numbers with country code as prefix."
            ];
            $rules = [
                'first_name'        =>  'required|min:3|max:55|regex:/^[a-zA-Z0-9\s]+$/',
                'last_name'         =>  'required|min:3|max:55|regex:/^[a-zA-Z0-9\s]+$/',
                'email'             =>  'required|min:6|max:80',
                'mobile_number'     =>  'required|regex:/^(\+[0-9]*)$/|min:7|max:20',
                'image'             =>  'mimes:jpeg,jpg,png,gif,JPEG,JPG,PNG,GIF|max:100000',
                'password'          =>  'required|min:6|max:55|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
                'confirm_password'  =>  'required|same:password|min:6|max:55',
            ];
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
            $has_emojis_old =   has_emojis_old( $request['password'] );
            if($has_emojis_old){ $emojy_errors["password"]   =  ["The password field should not contain emojis"];  }
            $has_emojis_old =   has_emojis_old( $request['confirm_password'] );
            if($has_emojis_old){ $emojy_errors["confirm_password"]   =  ["The confirm password field should not contain emojis"];  }
            if(!empty($emojy_errors)){
                return redirect()->back()->withInput()->withErrors($emojy_errors);
            }
            /* Emoji Block Work End */
            /** Check Exists Work Start **/
            $exists_error = [];
            $exists   =   Users::where("email",$request['email'])->where("is_delete",0)->get();
            if($exists->count() > 0){ $exists_error["email"]   =  ["The email has already been taken"];  }
            $exists   =   Users::where("mobile_number",$request['mobile_number'])->where("is_delete",0)->get();
            if($exists->count() > 0){ $exists_error["mobile_number"]   =  ["The mobile number has already been taken"];  }
            if(!empty($exists_error)){
                return redirect()->back()->withInput()->withErrors($exists_error);
            }
            /** Check Exists Work End **/
            $user_data              =   new Users();
            $user_data->first_name  =   $request['first_name'];
            $user_data->last_name   =   $request['last_name'];
            $username               =   $request['first_name']." ".$request['last_name'];
            $user_data->name        =   $username;
            $user_data->email       =   $request['email'];
            $user_data->mobile_number      =   ($request['mobile_number'])? $request['mobile_number'] : null;
            $user_data->role_id     =   $this->role_id;
            $user_data->password    =   Hash::make($request['password']);
            if ($request->hasFile('image')) {
                $image          =   $request->file('image');
                $name           =   time().'.'.$image->getClientOriginalExtension();
                $destinationPath=   public_path('/uploads/user_images');
                $image->move($destinationPath, $name);
                $user_data->image   =   $name;
            }
            $user_data->save();
            $user_id        =   $user_data->id;
            /* Registration Email Send Work Start */
            $url        =   url('login');
            $content    =   array("username" => $username, "role" => "User", "url"=>$url, "email" => $request['email'], "password" => $request['password']);
            $options    =   [
                "to_name"   =>  $username,
                "to_email"  =>  $request['email'],
            ];
            $this->mail_send('admin-new-user-registration',$subject=array(),$content,$options);
            /* Registration Email Send Work End */
            toastr()->success($this->page_title." created successfully");
            $redirect_url       =   url('admin').'/'.$this->slug;
            return redirect()->to($redirect_url);
        }else{
            return view('backend.'.$this->slug.'.add');
        }
    }

    public function edit($id,Request $request){
        if($request->isMethod('post')){
            $messages = [
                'password.same' => "Password and Confirm password didn't match.",
                'password.regex' => "Your password must be more than 6 characters long, should contain at-least 1 Uppercase, 1 Lowercase, 1 Numeric and 1 special character.",
                'first_name.regex' => "The :attribute may only contain letters, numbers and spaces.",
                'last_name.regex' => "The :attribute may only contain letters, numbers and spaces.",
                'mobile_number.regex' => "The :attribute may only contain numbers with country code as prefix.",
            ];
            $rules = [
                'first_name'        =>  'required|min:3|max:55|regex:/^[a-zA-Z0-9\s]+$/',
                'last_name'         =>  'required|min:3|max:55|regex:/^[a-zA-Z0-9\s]+$/',
                'email'             =>  'required|min:6|max:80',
                'mobile_number'     =>  'required|regex:/^(\+[0-9]*)$/|min:7|max:20',
                'image'             =>  'mimes:jpeg,jpg,png,gif,JPEG,JPG,PNG,GIF|max:100000',
            ];
            if(!empty($request['password'])){
                $rules['password']  =   'required|min:6|max:55|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/';
                $rules['confirm_password']  =   'required|same:password|min:6|max:55';
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
            $has_emojis_old =   has_emojis_old( $request['password'] );
            if($has_emojis_old){ $emojy_errors["password"]   =  ["The password field should not contain emojis"];  }
            $has_emojis_old =   has_emojis_old( $request['confirm_password'] );
            if($has_emojis_old){ $emojy_errors["confirm_password"]   =  ["The confirm password field should not contain emojis"];  }
            if(!empty($emojy_errors)){
                return redirect()->back()->withInput()->withErrors($emojy_errors);
            }
            /* Emoji Block Work End */
            /** Check Exists Work Start **/
            $exists_error = [];
            $exists   =   Users::where("id","!=",base64_decode($id))->where("email",$request['email'])->where("is_delete",0)->get();
            if($exists->count() > 0){ $exists_error["email"]   =  ["The email has already been taken"];  }
            $exists   =   Users::where("id","!=",base64_decode($id))->where("mobile_number",$request['mobile_number'])->where("is_delete",0)->get();
            if($exists->count() > 0){ $exists_error["mobile_number"]   =  ["The mobile number has already been taken"];  }
            if(!empty($exists_error)){
                return redirect()->back()->withInput()->withErrors($exists_error);
            }
            /** Check Exists Work End **/
            $user_data              =   Users::find(base64_decode($id));
            $user_data->first_name  =   $request['first_name'];
            $user_data->last_name   =   $request['last_name'];
            $username               =   $request['first_name']." ".$request['last_name'];
            $user_data->name        =   $username;
            $user_data->email       =   $request['email'];
            $user_data->mobile_number      =   ($request['mobile_number'])? $request['mobile_number'] : null;
            $user_data->role_id     =   $this->role_id;
            if(!empty($request['password'])){
                $user_data->password=   Hash::make($request['password']);
            }
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
            /* Password Update Email Send Work Start */
            if(!empty($request['password'])){
                $content    =   array("username" => $username, "email" => $request['email'], "password" => $request['password']);
                $options    =   [
                    "to_name"   =>  $username,
                    "to_email"  =>  $request['email'],
                ];
                $this->mail_send('admin-user-password-update',$subject=array(),$content,$options);
            }
            /* Password Update Email Send Work End */
            toastr()->success($this->page_title." updated successfully");
            $redirect_url       =   url('admin').'/'.$this->slug.getUrlParams();
            return redirect()->to($redirect_url);
        }else{
            $record    =   Users::where("id",base64_decode($id))->first();
            if(!empty($record)){
                return view('backend.'.$this->slug.'.edit',compact('record'));
            }else{
                toastr()->error("Wrong Url");
                return redirect()->back();
            }
        }
    }
    
    public function status_update($id,$status,Request $request){
        Users::where("id",base64_decode($id))->update(["status"=>$status]);
        toastr()->success($this->page_title." status updated successfully");
        $redirect_url       =   url('admin').'/'.$this->slug.getUrlParams();
        return redirect()->to($redirect_url);
    }
    
    public function delete($id,Request $request){
        $user_data  =   Users::where("id",base64_decode($id))->first();
        $update_data    =   [
            'username'     =>  null,
            'email'     =>  null,
            'mobile_number'    =>  null,
            'facebook_id'    =>  null,
            'instagram_id'    =>  null,
            'old_username' =>  $user_data->username,
            'old_email' =>  $user_data->email,
            'old_mobile_number'=>  $user_data->mobile_number,
            'old_facebook_id'=>  $user_data->facebook_id,
            'old_instagram_id'=>  $user_data->instagram_id,
            'is_delete' =>  1,
        ];
        Users::where("id",base64_decode($id))->update($update_data);
        toastr()->success($this->page_title." deleted successfully");
        $redirect_url       =   url('admin').'/'.$this->slug.getUrlParams();
        return redirect()->to($redirect_url);
    }

    public function export($type,Request $request){
        $ids        =   (array)json_decode($request['ids']);
        $query      =   Users::where("is_delete",0)->where("role_id",$this->role_id)->orderBy("id","desc");
        if(!empty($ids)){
            $query->whereIn("id",$ids);
        }
        $records    =   $query->get();
        // Initialize the array which will be passed into the Excel
        // generator.
        $exportArray = []; 
        // Define the Excel spreadsheet headers
        $exportArray[] = ['SNO', 'Name','Email','Mobile Number','Status'];
        // Convert each member of the returned collection into an array,
        // and append it to the payments array.
        $counter                    =   1;
        foreach ($records->toArray() as $record) {
            $exportData['sno']      =   $counter;
            $exportData['name']     =   $record['name'];
            $exportData['email']    =   $record['email'];
            $exportData['mobile_number']   =   $record['mobile_number'];
            $exportData['status']   =   ($record['status'] == 1)? 'Active' : 'Deactivate';
            $exportArray[]          =   $exportData;
            $counter++;
        }
        $filename                   =   $this->page_title." ".date("d/m/Y");
        if($type == "csv"){
            $csv_file               =   $filename . ".csv";
            header("Content-Type: text/csv");
            header("Content-Disposition: attachment; filename=\"$csv_file\"");
            $fh = fopen( 'php://output', 'w' );
            $is_coloumn = true;
            if(!empty($exportArray)){
                foreach($exportArray as $record){
                    fputcsv($fh, $record);
                    $is_coloumn = false;
                }
                fclose($fh);
            }
            exit;
        }else{
            toastr()->error("Wrong Url!!");
            return redirect()->back();
        }
    }

}
