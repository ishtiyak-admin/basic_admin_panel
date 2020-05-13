<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\CommonController;
use Illuminate\Http\Request;
use App\Models\CmsPage;
use App\Models\Enquiry;
use App\Models\Users;
use App\Models\Faq;
use Validator;
use Hash;
use Cookie;
use Auth;

class CmsPagesController extends CommonController{

    public function __construct(){ }

    public function cms_pages($slug, Request $request){
        if($slug == "contact-us"){
            if($request->isMethod('post')){
                $rules  =   [
                    "name"     =>  "required",
                    "email"    =>  "required|email",
                    "message"  =>  "required",
                ];
                $validator  =   Validator::make($request->all(),$rules);
                if($validator->fails()){
                    return redirect()->back()->withInput()->withErrors($validator);
                }
                $enquiry_data   =   new Enquiry();
                $enquiry_data->name     =   $request['name'];
                $enquiry_data->email    =   $request['email'];
                $enquiry_data->message  =   $request['message'];
                $enquiry_data->save();
                /** Mail Send to customer Start **/
                $content    =   array("user_name" => $request['name']);
                $options    =   [
                                    "to_name"   =>  $request['name'],
                                    "to_email"  =>  $request['email'],
                ];
                $this->mail_send('enquiry-form-submit-confirmation',$subject=array(),$content,$options);
                /** Mail Send to customer End **/
                toastr()->success("Form Submitted Successfully");
                return redirect()->back();
            }else{
                return view('frontend.pages.contact_us');
            }
        }else if($slug == "faqs"){
            $records     =   Faq::where("status",1)->where("is_delete",0)->orderBy("id","desc")->get();
            if($records->count() > 0){
                return view('frontend.pages.faqs',compact('records'));
            }else{
                toastr()->error("Wrong Url!!");
                return redirect()->to('/');
            }
        }else{
            $record     =   CmsPage::where("slug",$slug)->where("status",1)->where("is_delete",0)->first();
            if(!empty($record)){
                return view('frontend.pages.cms_pages',compact('record'));
            }else{
                toastr()->error("Wrong Url!!");
                return redirect()->to('/');
            }
        }
    }
    
}
