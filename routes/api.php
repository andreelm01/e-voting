<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// change status rw
Route::post('/admin-rw/{id}/change-status', 'Admin\RwController@change_status');

// change status rt
Route::post('/admin-rt/{id}/change-status', 'Admin\RtController@change_status');

// change status user
Route::post('/admin-user/{id}/change-status', 'Admin\UserController@change_status');

// change status pemilihan
Route::post('/admin-pemilihan/{id}/change-status', 'Admin\PemilihanController@change_status');

// change status calon
Route::post('/admin-calon/{id}/change-status', 'Admin\CalonController@change_status');
