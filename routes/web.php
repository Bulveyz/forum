<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('threads/{channel?}', 'ThreadController@index');
Route::get('threads/{thread}', 'ThreadController@show');