<?php

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

Route::get('/', 'User\IndexController@index')->name('index');
Route::post('/send-email', 'User\IndexController@send_email');

//==============route for login admin start=====================
Route::get('administrator-login', 'Admin\AdminController@admin_login')->name('admin-login');
Route::post('/admin-login-check','Admin\AdminController@admin_login_check');

//route for log out
Route::get('/admin-logout','Admin\AdminController@admin_logout');
//==============route for login admin end=====================
// route for admin
Route::get('administrator', 'Admin\AdminController@index')->name('administrator');

// route for RW
Route::resource('admin-rw', 'Admin\RwController');

// route for Rt
Route::resource('admin-rt', 'Admin\RtController');
Route::get('getRT/{id}','Admin\UserController@getRT')->name('getRT');

Route::get('admin-list-rt/{id}', 'Admin\RtController@list_rt')->name('admin-list-rt');

// route for User
Route::resource('admin-user', 'Admin\UserController');
Route::get('user-report/{id}', 'Admin\UserController@user_report')->name('user-report');

// route for Pemilihan
Route::resource('admin-pemilihan', 'Admin\PemilihanController');

// route for Calon
Route::resource('admin-calon', 'Admin\CalonController');
Route::get('admin-list-calon/{id}', 'Admin\CalonController@list_calon')->name('admin-list-calon');

// route for Hasil
Route::resource('admin-hasil', 'Admin\HasilController');
Route::get('admin-list-hasil/{id}', 'Admin\HasilController@show')->name('admin-list-hasil');

Route::get('admin-detail-hasil', 'Admin\HasilController@detail_hasil')->name('admin-detail-hasil');

Route::get('admin-hasil-report/{id}', 'Admin\HasilController@report_hasil')->name('admin-hasil-report');

// route for User
Route::resource('admin-log', 'Admin\LogController');

//==============route for login user start=====================
Route::get('user-login', 'User\UserLoginController@user_login')->name('user-login');
Route::post('/user-login-check','User\UserLoginController@user_login_check');
Route::get('/user-logout','User\UserLoginController@user_logout')->name('user-logout');
//==============route for login user end=====================
//
// route for user
Route::get('user', 'User\UserLoginController@dashboard')->name('user');

// melihat profile
Route::get('/profile/{id}','User\UserLoginController@profile')->name('profile');

// route for update password User
Route::resource('user-password', 'User\PasswordUserController');

// melihat pemilihan user
Route::get('/user-pemilihan/{id}','User\UserLoginController@user_pemilihan')->name('user-pemilihan');

// save pemilihan
Route::post('/simpan-pemilihan','User\UserLoginController@store');
// show report
Route::get('user-hasil/{id}', 'User\UserLoginController@show')->name('user-hasil');


// revalidate
Route::group(['middleware' => 'revalidate'], function()
{
    // route for admin
	Route::get('administrator', 'Admin\AdminController@index')->name('administrator');

	// route for RW
	Route::resource('admin-rw', 'Admin\RwController');

	// route for Rt
	Route::resource('admin-rt', 'Admin\RtController');
	Route::get('getRT/{id}','Admin\UserController@getRT')->name('getRT');

	Route::get('admin-list-rt/{id}', 'Admin\RtController@list_rt')->name('admin-list-rt');

	// route for User
	Route::resource('admin-user', 'Admin\UserController');
	Route::get('user-report/{id}', 'Admin\UserController@user_report')->name('user-report');

	// route for Pemilihan
	Route::resource('admin-pemilihan', 'Admin\PemilihanController');

	// route for Calon
	Route::resource('admin-calon', 'Admin\CalonController');
	Route::get('admin-list-calon/{id}', 'Admin\CalonController@list_calon')->name('admin-list-calon');

	// route for Hasil
	Route::resource('admin-hasil', 'Admin\HasilController');
	Route::get('admin-list-hasil/{id}', 'Admin\HasilController@show')->name('admin-list-hasil');

	Route::get('admin-detail-hasil', 'Admin\HasilController@detail_hasil')->name('admin-detail-hasil');

	Route::get('admin-hasil-report/{id}', 'Admin\HasilController@report_hasil')->name('admin-hasil-report');

	// route for User
	Route::resource('admin-log', 'Admin\LogController');


	// user revalidate
	

	// route for user
	Route::get('user', 'User\UserLoginController@dashboard')->name('user');

	// melihat profile
	Route::get('/profile/{id}','User\UserLoginController@profile')->name('profile');

	// route for update password User
	Route::resource('user-password', 'User\PasswordUserController');

	// melihat pemilihan user
	Route::get('/user-pemilihan/{id}','User\UserLoginController@user_pemilihan')->name('user-pemilihan');

	// save pemilihan
	Route::post('/simpan-pemilihan','User\UserLoginController@store');
	// show report
	Route::get('user-hasil/{id}', 'User\UserLoginController@show')->name('user-hasil');

});
