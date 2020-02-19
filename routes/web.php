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
    return view('welcome');
});

Route::get('/home', function () {
    return '/home';
});

// url /adult-zone?age=18
Route::get('/adult-zone', function () {
    return '/adult-zone';
})->middleware('checkage');

// url /post/1?role=editor&place=school
Route::get('post/{id}', function ($id) {
    return 'post: ' . $id;
})->middleware('checkrole:editor,school');
