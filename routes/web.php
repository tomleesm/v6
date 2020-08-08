<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
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


Route::get('/paginate', function() {
    $users = DB::table('users')->paginate(15);
    return view('paginate', ['users' => $users]);
});

Route::get('/paginate/simple', function() {
    $users = DB::table('users')->simplePaginate(10);

    return view('paginate-simple', ['users' => $users]);
});

Route::get('/paginate/oneachside', function() {
    $users = DB::table('users')->paginate(15);
    return view('paginate-oneachside', ['users' => $users]);
});

Route::get('/paginate/custom', function(Request $request) {
    $users = DB::table('users')->get();

    $currentPage = intval($request->input('page'));
    $currentPage = $currentPage <= 0 ? 1 : $currentPage;

    $perPage = 10;
    $offset = ($currentPage - 1) * $perPage;
    $items = $users->slice($offset, $perPage);
    $total = $users->count();

    $users = new LengthAwarePaginator($items, $total, $perPage, $currentPage,
                                      [
                                          'path' => Paginator::resolveCurrentPath(),
                                          'pageName' => 'page'
                                      ]);

    return view('paginate', ['users' => $users]);
});
