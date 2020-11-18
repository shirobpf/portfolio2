<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\UsersEntryController;
use App\Http\Controllers\UsersOperateController;



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

Route::get('/UsersEntry',[UsersEntryController::class,'input']);
Route::patch('/UsersEntry',[UsersEntryController::class,'confirm']);
Route::get('/Users/list',[UsersOperateController::class,'index']);
Route::post('/Users/login',[UsersOperateController::class,'login']);
Route::get('/Users/show', [UsersOperateController::class, 'show']);
Route::post('/Users/show', [UsersOperateController::class, 'show']);
Route::post('/testjson', function (Request $request) {
    return response()->json($request);
    $data = $request;
    view('testjson',$data);
});
 