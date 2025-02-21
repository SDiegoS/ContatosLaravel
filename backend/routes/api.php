<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::prefix('v1')->group(function () {
    Route::get('/', function () {
        return response()->json(['status' => true]);
    });
    Route::namespace('App\Http\Controllers\api\v1')->group(function (){
        Route::resource('/users', 'UserController')->except(['create', 'edit']);
    });
});

