<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //set relationship
    public function category(){
        return $this->belongsTo('App\Category');
    }
    //set up many to many relationship
    public function tags(){
        return $this->belongsToMany('App\Tag');
    }
    
    public function comments(){
        return $this->hasMany('App\Comment');
    }
}
