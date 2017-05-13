<?php

namespace App\Http\Controllers;

class PagesController extends Controller{
    
    public function getIndex(){
        return view('pages/welcome');//can use / or . 
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