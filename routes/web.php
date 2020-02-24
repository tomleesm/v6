<?php
use Illuminate\Support\Facades\URL;
use Illuminate\Http\Request;
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
Route::get('/url', function () { return view('url'); });
Route::get('/url/facade', function () { return URL::current(); });

Route::get('/post/{post}', function ($id) {
    return 'post/' . $id;
})->name('post.show');

Route::get('/post/{post}/comment/{comment}', function () {
    //
})->name('comment.show');

Route::get('/unsubscribe/{user}', function (Request $request) {
    if($request->hasValidSignature()) {
        return 'unsubscribe.user OK';
    }
    abort(401);
})->name('unsubscribe.user');
Route::get('/unsubscribe', function (Request $request) {
    return 'unsubscribe OK';
})->name('unsubscribe')->middleware('signed');

Route::get('/home/{user}', 'HomeController@index');

Route::get('/{locale}/posts', function () {
    return 'en.posts';
})->name('post.index')->middleware('locale');
