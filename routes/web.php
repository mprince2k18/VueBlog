<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'PostController@all');
Route::get('/posts/{post}', 'PostController@single');

Route::get('/admin/{any}', 'AdminController@index')->where('any', '.*');

Route::get('/{post}/comments', 'CommentController@index');
Route::post('/{post}/comments', 'CommentController@store');

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
