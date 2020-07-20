<?php

use App\Notifications\InvoicePaid;
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

Route::get('/preview', function() {
    $user = factory(\App\User::class)->make();
    return (new InvoicePaid)->toMail($user);
});

Route::get('/send', function() {
    $user = factory(\App\User::class)->make();
    $user->notify(new InvoicePaid);
    return 'mail sent';
});
