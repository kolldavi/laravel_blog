<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //tell laravel to uses categories model
    protected $table = 'categories';
    
    //set relationship in db 1-to-many
    public function posts(){
        return $this->hasMany('App\Post');
    }
    
}
