<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Tag;
use App\Post;
use Session;
use App\Category;

class PostController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
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
        //get all categories
        
        $categories = Category::all();
        $tags = Tag::all();
        //create form view
        return view('posts/create')->withCategories($categories)->withTags($tags);
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
            'body' => 'required',
            'category_id'=>'required|integer'
            
            ]);
            
        //store in database
        $post = new Post;
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->body = $request->body;
        $post->category_id = $request->category_id;
        $post->save();
        
        $post->tags()->sync($request->tags, false);
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
        
        
        //display view of all categories
        $categories = Category::all();
        $categoriesMap = [];
        foreach($categories as $category){
            $categoriesMap[$category->id] = $category->name;
        }
        
        $tags = Tag::all();
        $tags2 = array();
        foreach ($tags as $tag) {
            $tags2[$tag->id] = $tag->name;
        }
        
        //return view
        return view('posts.edit')->withPost($post)->withCategories($categoriesMap)->withTags($tags2);
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
        //check if slug changed
        $post = Post::find($id);
        
        if($request->input('slug') == $post->slug){
    //validate data
        $this->validate($request,[
            'title' => 'required|max:255',
            'body' => 'required',
            'category_id'=>'required|integer'
            ]);
        }else{
        //validate data
        $this->validate($request,[
            'title' => 'required|max:255',
            'slug' => 'required|alpha_dash|max:255|min:5|unique:posts,slug',
            'body' => 'required',
            'category_id'=>'required|integer'
            
            ]);
        }
            
        //save data 
        $post = Post::find($id);
        
        $post->title = $request->input('title');
        $post->slug = $request->input('slug');
        $post->body = $request->input('body');
        $post->category_id = $request->category_id;
        $post->save();
        
        //set tags in db
         if (isset($request->tags)) {
            $post->tags()->sync($request->tags);
        } else {
            $post->tags()->sync(array());
        }
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
        $post->tags()->detach();
        $post->delete();

        Session::flash('success',"The post ". $post->{'slug'} ." was deleted");
        return redirect()->route('posts.index');
    }
}
