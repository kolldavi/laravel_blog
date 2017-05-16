<?php

namespace App\Http\Controllers;
use App\Post;
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
}
?>