<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

 Route::group(['middelware'=>['web']],function(){
   Route::get('about', 'PagesController@getAbout');
   Route::get('contact', 'PagesController@getContact');
   Route::get('/','PagesController@getIndex' );
   Route::resource('posts','PostController');
 });

 
