<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //set relationship
    public function category(){
        return $this->belongsTo('App\Category');
    }
}
