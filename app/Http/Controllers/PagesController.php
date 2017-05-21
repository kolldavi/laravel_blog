<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Post;
use Mail;
use Session;
class PagesController extends Controller{
    
    public function getIndex(){
        
        $posts = Post::orderBy('created_at','desc')->limit(4)->get();
        return view('pages/welcome')->withPosts($posts);//can use / or . 
    }
    
    public function getContact(){
        $first = "David";
        $last = 'Koller';
        $fullname = "$first $last";
        
      //  return view('pages.contact')->with("fullname",$fullname); ->withFullname($fullname); 
        return view('pages.contact');
    }
    
    public function getAbout(){
        return view('pages/about');
    }
    
    public function postContact(Request $request){
        $this->validate($request,[
            "email" => "required|email",
            "subject" => "required",
            "message" => "required"
            ]);
        $data = [
            "email"=>$request->email,
            "subject"=>$request->subject,
            "bodyMessage"=>$request->message];
        Mail::send('emails.contact',$data,function($msg) use ($data){
            $msg->from($data['email']);
            $msg->to('kolldavi@gmail.com');
            $msg->subject($data['subject']);
        });
        
        Session::flash('success','Your Email Was Sent');
        
        return redirect('/');
    }
}
?>