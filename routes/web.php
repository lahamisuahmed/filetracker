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

Route::get('/', function () {
	if(auth()->user()){
		return view('home');
	}else{
		return view('auth.login');
	}
});

Auth::routes();

// Route::middleware('auth')->group(function () {
// 	Route::resource('/projects', 'Web\HomeController@index')->name('home');
// 	Route::get('/home', 'HomeController@index')->name('home');
// });

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/histories/returnedfiles', 'Web\HistoryController@returned')->name('returnedfiles');
Route::get('/histories/duefiles', 'Web\HistoryController@due')->name('duefiles');
Route::resource('/departments', 'Web\DepartmentController');
Route::resource('/files', 'Web\FileController');
Route::resource('/units', 'Web\UnitController');
Route::resource('/histories', 'Web\HistoryController');
