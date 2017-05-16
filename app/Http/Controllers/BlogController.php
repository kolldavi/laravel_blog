<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Post;

class BlogController extends Controller
{
    //display all posts
    public function getIndex(){
        $posts = Post::paginate(2);
        return view('blog.index')->withPosts($posts);
    }
    //display single post
    public function getSingle($slug){
        //fetch from db
        $post = Post::where('slug','=',$slug)->first();
        //return view
        return view('blog.single')->withPost($post);
    }
}
