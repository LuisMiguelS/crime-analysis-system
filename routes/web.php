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
    return view('welcome');
});

Auth::routes();


Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'auth'], function(){
	
	Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

	# Rutas para el modulo "Crime" #
	Route::get('/criminal-profile', 'CrimesController@consultigCriminalProfile')->name('crime_profile');
	Route::post('/criminal-profile', 'CrimesController@criminalProfile')->name('see_crime_profile');

});





Route::post('/badusers', 'BadUserController@store')->name('bad.user');

Route::get('/chart', function () {
	return view('admin.chart');
});