<?php

use Illuminate\Support\Facades\Mail;

//Route::get('mail', function() {
//    $data = [
//        'title' => 'Title: NEWSTUFF ',
//        'content' => 'Content: REVIEWS'
//    ];
//
//    Mail::send('emails.test', $data, function($message) {
//        $message->to('jamieruark25@gmail.com', 'Jamie')->subject('Helloooooo');
//    });
//
//});

View::share('c', App\Category::latest()->get()); // c = category

//View::share('categories', App\Category::latest()->get());

View::share('blog', App\Blog::all());
View::share('user', App\User::all());

Route::get('/', ['as' => '/', 'uses' => 'BlogController@index']);

Auth::routes();

Route::get('/blog/bin', 'BlogController@bin');
Route::get('/blog/bin/{id}/restore', 'BlogController@restore');
Route::delete('/blog/bin/{id}/destroyblog', 'BlogController@destroyBlog');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/blog', 'BlogController@index');
Route::get('/blog/create', 'BlogController@create');
Route::post('/blog/store', 'BlogController@store');
Route::get('/blog/{slug}', 'BlogController@show');
Route::get('/blog/{id}/edit', 'BlogController@edit');

//Route::patch('/blog/{id}/publish', 'BlogController@publish');

Route::patch('/blog/{id}', 'BlogController@update');
Route::delete('/blog/{id}', 'BlogController@destroy');

Route::get('admin', 'AdminController@index');

Route::resource('categories', 'CategoryController');
Route::resource('media', 'PhotosController');

Route::get('userslist', 'UserController@userslist');
Route::resource('users', 'UserController');

Route::get('contact', 'MailController@contact');
Route::post('contact/send', 'MailController@send');

Route::get('/{username?}', array('as' => 'show', 'uses' => 'UserController@show'));

