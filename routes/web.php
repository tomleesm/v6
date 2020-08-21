<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;

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
    $items = $users->forPage($currentPage, $perPage);
    $total = $users->count();

    $users = new LengthAwarePaginator($items, $total, $perPage, $currentPage,
                                      [
                                          'path' => Paginator::resolveCurrentPath(),
                                          'pageName' => 'page',
                                      ]);

    return view('paginate', ['users' => $users]);
});

Route::get('/paginate/collection', function(Request $request) {
    $users = DB::table('users')->get();
    $users->paginate(10);
    return view('paginate', ['users' => $users]);
});
