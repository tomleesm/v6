<?php

use Illuminate\Support\Facades\Mail;
use App\Mail\MailTest;
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
Route::get('send', function () {
    Mail::to('tomchild0@gmail.com')->send(new MailTest());
});
Route::get('preview', function () {
    return new App\Mail\MailTest();
});
