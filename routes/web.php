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
	Route::get('/consulting-crimes', 'CrimesController@generalConsulting')->name('general_consulting');
	Route::post('/generate-consulting', 'CrimesController@generateData')->name('generate_consulting');
	
	# Rutas para el modulo "Danger Person" #
	Route::get('/danger_person', 'DangerPersonController@index')->name('danger_person');
	Route::post('/notification', 'DangerPersonController@store')->name('save_notification');
	Route::post('/notification/get', 'DangerPersonController@notification');

	# Rutas para el modulo de "Vehicles" #
	Route::get('/vehicle-status', 'VehiclesController@consultigVehicleStatus')->name('vehicle_status');
	Route::post('/vehicle-status', 'VehiclesController@vehicleStatus')->name('see_vehicle_status');
	Route::get('/consulting-accidents', 'VehiclesController@index')->name('general_consulting_accidents');
	Route::post('/consulting-accidents', 'VehiclesController@generateData')->name('general_consulting_accidents');
});

Route::get('/test', function () {
	return App\Crime::find(1)->person();
});