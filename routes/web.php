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

Route::get('/logged-out', function () {
	return view('auth.logout');
});

Route::get('/test', function () {
	return App\Notice::all();
});

Auth::routes();

# Rutas de Administracion
// 'middleware' => 'auth'
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'auth'], function(){
	
	Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

	# Rutas para el modulo "Crime" #
	Route::get('/criminal-profile', 'CrimesController@consultigCriminalProfile')->name('crime_profile');
	Route::post('/criminal-profile', 'CrimesController@criminalProfile')->name('see_crime_profile');
	Route::get('/consulting-crimes', 'CrimesController@generalConsulting')->name('general_consulting');
	Route::post('/generate-consulting', 'CrimesController@generateData')->name('generate_consulting');
	
	# Rutas para el modulo "Danger Person" #
	Route::get('/danger-person-alerts', 'DangerPersonController@index')->name('danger_person_alerts');
	Route::post('/danger-person-alert/{id}', 'DangerPersonController@encontrado')->name('danger_person_found');
	Route::get('/danger-person', 'DangerPersonController@create')->name('danger_person');
	Route::post('/notification', 'DangerPersonController@store')->name('save_notification');
	Route::post('/notification/get', 'DangerPersonController@notification');

	# Rutas para el modulo de "Vehicles" #
	Route::get('/vehicle-status', 'VehiclesController@consultigVehicleStatus')->name('vehicle_status');
	Route::post('/vehicle-status', 'VehiclesController@vehicleStatus')->name('see_vehicle_status');
	Route::get('/consulting-accidents', 'VehiclesController@index')->name('general_consulting_accidents');
	Route::post('/consulting-accidents', 'VehiclesController@generateData')->name('general_consulting_accidents');

	# Rutas para el modulo de "Vehicles Incidents"
	Route::get('/consulting-incidents', 'IncidentsController@generalConsulting')->name('consulting_incident');
	Route::post('/consulting-incidents', 'IncidentsController@generateData')->name('consulting_generate_incident');
});



# Rutas de la API
Route::group(['prefix' => 'api'], function(){
	
	// consulta el perfil criminal de una persona
	Route::post('/criminal-profile', 'ApiRequests@criminalProfile');
	
	// muestra las notificaciones de personas peligrosas
	Route::post('/notifications', 'ApiRequests@dangerPersons');

	# Rutas para el modulo de "Vehicles" #
	Route::post('/vehicle-profile', 'ApiRequests@vehicleProfile');

	# Rutas para las "Estadisticas" #
	Route::post('/estadisticas', 'ApiRequests@estadisticas');

	# Rutas para las "Estadisticas" #
	Route::get('/rss', 'ApiRequests@noticias');
});