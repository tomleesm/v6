<?php

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
    return view('app');
})->name('home');

Route::get('/about/{id}/product/{pid}', function () {
    return 'about';
})->name('about');

Route::get('/blog', function () {
    return 'blog';
})->name('blog');

Route::get('/post/{title}', function () {
    return 'post';
})->name('post');

Route::get('/category/{id}', function () {
    return 'category';
})->name('category');
