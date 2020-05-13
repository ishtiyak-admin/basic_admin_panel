<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\CommonController;
use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Enquiry;
use Redirect;
use Hash;
use Validator;
use Auth;
use Session;

class EnquiryController extends CommonController{

    protected $table        =   'enquiries';
    protected $slug         =   'enquiries';
    protected $page_title   =   'Enquiry';
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
        $query          =   Enquiry::select("*");
        $counter        =   ( ( ($request['page'])? $request['page'] : 1 ) -1 )*$this->pagination;
        if(!empty($search_form)){
            foreach($search_form as $key => $value){
                if($value == "status"){
                    if($request[$value] != 'all' && !empty($request[$value])){ $query->where($value,($request[$value]=="active"? 1 : 0)); }
                }else if(!empty($request[$value])){ $query->where($value,"like","%$request[$value]%"); }
            }
        }
        $query->where("is_delete",0)->orderBy($orderBy,$order);
        $total_records  =   $query->count();
        $records        =   $query->paginate($this->pagination);
        return view('backend.'.$this->slug.'.index',compact('counter','records'));
    }


    public function view($id,Request $request){
        $record    =   Enquiry::where("id",base64_decode($id))->first();
        if(!empty($record)){
            return view('backend.'.$this->slug.'.view',compact('record'));
        }else{
            toastr()->error("Wrong Url");
            return redirect()->back();
        }
    }

    public function reply($id, Request $request){
        $id             =   base64_decode($id);
        $name           =   $request['name'];
        $email          =   $request['email'];
        $email_content  =   $request['content'];
        if(!empty($email) && !empty($email_content)){
            $attachment_name    =   null;
            $attachment_path    =   '';
            if ($request->hasFile('attachment')) {
                $image          =   $request->file('attachment');
                $attachment_name=   time().'.'.$image->getClientOriginalExtension();
                $destinationPath=   public_path('/uploads/enquiry_attachments');
                $image->move($destinationPath, $attachment_name);
                $attachment_path=   url("public/uploads/enquiry_attachments/".$attachment_name);
            }
            $content    =   array("user_name" => $name, 'email_content' => $email_content );
            $options    =   [
                "to_name"   =>  $name,
                "to_email"  =>  $email,
            ];
            $this->mail_send('admin-enquiry-reply',$subject=array(),$content,$options,$attachment_path);
            Enquiry::where("id",$id)->update([ "replied" => 1, "reply_message" => $email_content, "attachment" => $attachment_name ]);
            toastr()->success("Enquiry replied successfully");
            $redirect_url       =   url('admin').'/'.$this->slug.getUrlParams();
            return redirect()->to($redirect_url);
        }else{
            toastr()->error("Something went wrong");
            return redirect()->to(url('admin/'.$this->slug.getUrlParams()));
        }
    }

    public function edit($id,Request $request){
        if($request->isMethod('post')){
            $messages   =   [
                'title.regex' => "The :attribute may only contain letters, numbers and spaces.",
            ];
            $validator = Validator::make($request->all(), [
                'title'     =>  'required|min:6|max:250|regex:/^[a-zA-Z0-9\s]+$/',
                'subject'   =>  'required',
                'content'   =>  'required',
            ],$messages);
            if ($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
            }
            /* Emoji Block Work Start */
            $emojy_errors   =   [];
            $has_emojis_old =   has_emojis_old( $request['title'] );
            if($has_emojis_old){ $emojy_errors["title"]   =  ["The title field should not contain emojis"];  }
            $has_emojis_old =   has_emojis_old( $request['subject'] );
            if($has_emojis_old){ $emojy_errors["subject"]   =  ["The subject field should not contain emojis"];  }
            if(!empty($emojy_errors)){
                return redirect()->back()->withInput()->withErrors($emojy_errors);
            }
            /* Emoji Block Work End */
            /** Check Exists Work Start **/
            $exists_error = [];
            $exists   =   Enquiry::where("id","!=",base64_decode($id))->where("title",$request['title'])->where("is_delete",0)->get();
            if($exists->count() > 0){ $exists_error["title"]   =  ["The title has already been taken"];  }
            if(!empty($exists_error)){
                return redirect()->back()->withInput()->withErrors($exists_error);
            }
            /** Check Exists Work End **/
            $email_content          =   Enquiry::find(base64_decode($id));
            $email_content->title   =   $request['title'];
            $email_content->subject =   $request['subject'];
            $email_content->content =   $request['content'];
            $email_content->save();
            toastr()->success($this->page_title." updated successfully");
            $redirect_url       =   url('admin').'/'.$this->slug.getUrlParams();
            return redirect()->to($redirect_url);
        }else{
            $record    =   Enquiry::where("id",base64_decode($id))->first();
            if(!empty($record)){
                return view('backend.'.$this->slug.'.edit',compact('record'));
            }else{
                toastr()->error("Wrong Url");
                return redirect()->back();
            }
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
            $messages   =   [
                'title.regex' => "The :attribute may only contain letters, numbers and spaces.",
            ];
            $validator = Validator::make($request->all(), [
                'title'     =>  'required|min:6|max:250|regex:/^[a-zA-Z0-9\s]+$/',
                'subject'   =>  'required',
                'content'   =>  'required',
            ],$messages);
            if ($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
            }
            /* Emoji Block Work Start */
            $emojy_errors   =   [];
            $has_emojis_old =   has_emojis_old( $request['title'] );
            if($has_emojis_old){ $emojy_errors["title"]   =  ["The title field should not contain emojis"];  }
            $has_emojis_old =   has_emojis_old( $request['subject'] );
            if($has_emojis_old){ $emojy_errors["subject"]   =  ["The subject field should not contain emojis"];  }
            if(!empty($emojy_errors)){
                return redirect()->back()->withInput()->withErrors($emojy_errors);
            }
            /* Emoji Block Work End */
            /** Check Exists Work Start **/
            $exists_error = [];
            $exists   =   Enquiry::where("title",$request['title'])->where("is_delete",0)->get();
            if($exists->count() > 0){ $exists_error["title"]   =  ["The title has already been taken"];  }
            if(!empty($exists_error)){
                return redirect()->back()->withInput()->withErrors($exists_error);
            }
            /** Check Exists Work End **/
            $email_content          =   new Enquiry();
            $email_content->title   =   $request['title'];
            $email_content->slug    =   $this->slugify($request['title']);
            $email_content->subject =   $request['subject'];
            $email_content->content =   $request['content'];
            $email_content->save();
            toastr()->success($this->page_title." created successfully");
            $redirect_url       =   url('admin').'/'.$this->slug;
            return redirect()->to($redirect_url);
        }else{
            return view('backend.'.$this->slug.'.add');
        }
    }
    
    public function delete($id,Request $request){
        Enquiry::where("id",base64_decode($id))->update(["is_delete"=>1]);
        toastr()->success($this->page_title." deleted successfully");
        $redirect_url       =   url('admin').'/'.$this->slug.getUrlParams();
        return redirect()->to($redirect_url);
    }
    
    public function status_update($id,$status,Request $request){
        Enquiry::where("id",base64_decode($id))->update(["status"=>$status]);
        toastr()->success($this->page_title." status updated successfully");
        $redirect_url       =   url('admin').'/'.$this->slug.getUrlParams();
        return redirect()->to($redirect_url);
    }

}
