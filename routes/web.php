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

Auth::routes();
Route::get('/', 'WelcomeController@index')->name('welcome');

Route::group(['middleware' => 'auth'], function(){

	Route::get('/home', 'HomeController@index')->name('home');
    Route::get('penilaian/daily', 'PenilaianController@daily')->name('penilaian.daily');
    Route::get('penilaian/monthly', 'PenilaianController@monthly')->name('penilaian.monthly');
    Route::get('penilaian/yearly', 'PenilaianController@yearly')->name('penilaian.yearly');

    Route::resource('role', 'RoleController');
    Route::resource('indikator', 'IndikatorController');
    Route::resource('variable', 'VariableController');
    Route::resource('penilaian', 'PenilaianController');
    Route::resource('user', 'UserController');

});
