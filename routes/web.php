<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('posts.create');
});

Route::post('/posts',function (){
    request()->validate([
       'title' => 'required',
       'body' => 'required',
       'g-recaptcha-response' => ['required',new \App\Rules\Recaptcha()]
    ]);
    dd(request()->all());
});
