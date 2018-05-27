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
	
	# Rutas para el modulo "Danger Person" #
	Route::get('danger_person', 'DangerPersonController@store');
	Route::post('notification/get', 'DangerPersonController@notification');

	# Rutas para el modulo de "Vehicles" #
	Route::get('vehicle-status', 'VehiclesController@consultigVehicleStatus')->name('vehicle_status');
	Route::post('vehicle-status', 'VehiclesController@vehicleStatus')->name('see_vehicle_status');
	

	Route::get('google-line-chart', 'VehiclesController@googleLineChart');
});



Route::get('/chart', function () {
	return view('admin.chart');
});