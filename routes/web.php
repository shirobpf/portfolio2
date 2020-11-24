<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\UsersEntryController;
use App\Http\Controllers\UsersOperateController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/list',[UsersOperateController::class,'index']);
Route::post('/login',[UsersOperateController::class,'login']);
Route::get('/details/{id}', [UsersOperateController::class, 'details']);
Route::post('/details', [UsersOperateController::class, 'update']);
Route::get('/destroy/{id}', [UsersOperateController::class, 'destroy']);
Route::get('/create', [UsersOperateController::class, 'update']);
