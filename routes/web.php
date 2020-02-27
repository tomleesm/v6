<?php
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
Route::get('/session/put', function (Request $request) {
    $request->session()->put('name', 'Tom');
    return $request->session()->get('name');
});
Route::get('/session/get/default', function (Request $request) { return $request->session()->get('vsvdswv', 'Default'); });

Route::get('/session/get/default/{id}', function (Request $request, $id) {
    return $request->session()->get('vsvdswv', function () use ($id)
    {
        $id++;
        return $id;
    });
})->where('id', '[0-9]+');
Route::get('/session/get/all', function (Request $request) { return $request->session()->all(); });
Route::get('/session/helper', function () { return session('name'); });
Route::get('/session/helper/default', function () { return session('bklfjfdf', 'John'); });
Route::get('/session/helper/store', function () {
    session(['email' => 'tomleesm@gmail.com']);
    return session('email');
});
Route::get('/session/helper/all', function (Request $request) { return session()->all(); });
Route::get('/session/has', function (Request $request) {
    $request->session()->put('abc', null);
    return var_export($request->session()->has('abc'), true);
});
Route::get('/session/exists', function (Request $request) {
    $request->session()->put('abc', null);
    return var_export($request->session()->exists('abc'), true);
});

Route::get('/session/get/array', function (Request $request) {
    $request->session()->put('user.terms', [1, 2, 3]);
    $request->session()->push('user.terms', 4);
    return $request->session()->get('user');
});
Route::get('/session/pull', function (Request $request) {
    $request->session()->put('name', 'Tom');
    $request->session()->pull('name');
    return $request->session()->all();
});
Route::get('/session/pull/array', function (Request $request) {
    $request->session()->put('user.terms', [1, 2, 3]);
    $request->session()->pull('user.terms.0'); // 應該得到
    return $request->session()->get('user.terms');
});
Route::get('/session/flash', function (Request $request) { return $request->session()->flash('status', 'Task was successful!'); });
Route::get('/session/flash/get', function (Request $request) { return $request->session()->get('status'); });
Route::get('/session/reflash', function (Request $request) { return $request->session()->reflash(); });
Route::get('/session/keep', function (Request $request) {
    $request->session()->flash('keep', 'It should be keep');
    return $request->session()->keep(['keep']);
});

Route::get('/session/forget', function (Request $request) { $request->session()->forget('name'); });
Route::get('/session/forget/array', function (Request $request) { $request->session()->forget('user.terms.0'); });
Route::get('/session/flush', function (Request $request) { $request->session()->flush(); });
Route::get('/session/regenerate', function (Request $request) { $request->session()->regenerate(); });

Route::get('/session/redis', function (Request $request) {
    $request->session()->put('name', 'Tom');
    return $request->session()->all();
});
