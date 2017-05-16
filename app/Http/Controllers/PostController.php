<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Post;
use Session;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //store all posts from db in $posts
       // $posts = Post::all();
        $posts = Post::orderBy('id','desc')->paginate(10);
        return view('posts.index')->with('posts',$posts);
       //return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //create form view
        return view('posts/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate the data on server
        $this->validate($request,[
            
            'title' => 'required|max:255',
            'slug' => 'required|alpha_dash|max:255|min:5',
            'body' => 'required'
            
            ]);
            
        //store in database
        $post = new Post;
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->body = $request->body;
        $post->save();
        
        //add flash success session
        Session::flash('success','This blog post was successfully saved');
        //redirect to another page
        return redirect()->route('posts.show',$post->id);
    }

    /**
     * Display the specified resource.c
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post =  Post::find($id);
        //show page 
        return view('posts/show')->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //find post in db
        $post = Post::find($id);
        
        //return view
        return view('posts.edit')->withPost($post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //validate data
        $this->validate($request,[
            'title' => 'required|max:255',
            'slug' => 'required|alpha_dash|max:255|min:5|unique:posts,slug',
            'body' => 'required'
            ]);
            
            
        //save data 
        $post = Post::find($id);
        
        $post->title = $request->input('title');
        $post->slug = $request->input('slug');
        $post->body = $request->input('body');
        $post->save();
        
        //flash data with success msg
         Session::flash('success','This blog post was successfully updated');
        // return view
        return redirect()->route('posts.show',$post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //delete post from database
        $post = Post::find($id);
        $post->delete();
        
        Session::flash('success','The post was deleted');
        return redirect()->route('posts.index');
    }
}
