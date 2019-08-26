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

Route::get('/change/{language}', ['as' => 'change', 'uses' => 'PagesController@change']);
Route::get('/', 'PagesController@verify');


Route::group(['prefix' => 'es'], function(){
    Route::get('/','PagesController@home')->name('inicio');

    Route::get('/home','PagesController@home')->name('home');
    Route::get('/rutas','PagesController@rutas')->name('rutas');
    Route::get('/contacto','PagesController@contacto')->name('contacto');
    Route::get('/preguntas-frecuentes','PagesController@preguntas')->name('preguntas-frecuentes');
    Route::get('/terminos-condiciones','PagesController@terminos')->name('terminos-condiciones');
    Route::get('/politica-privacidad','PagesController@politica')->name('politica-privacidad');
    Route::get('/politica-viaje','PagesController@pviaje')->name('politica-viaje');
    Route::get('/libro_reclamos','PagesController@libro_reclamos')->name('libro_reclamos');

    Route::get('/rutas/{ruta}','RutasController@show');
    Route::get('/buscar','PagesController@buscar');
    Route::get('/emprendedor/{sulg}','PagesController@emprendedor');

    Route::get('/registro/{id}', 'PagesController@registro')->name('registro');

    Route::get('/registro', 'PagesController@registro')->name('registro');

    Route::get('/login', 'PagesController@login');
    Route::get('/register', 'PagesController@register');
});

Route::group(['prefix' => 'en'], function(){
    Route::get('/','PagesController@home')->name('inicio');
    Route::get('/home','PagesController@home')->name('home');
    Route::get('/rutas','PagesController@rutas')->name('rutas');
    Route::get('/contacto','PagesController@contacto')->name('contacto');
    Route::get('/preguntas-frecuentes','PagesController@preguntas')->name('preguntas-frecuentes');
    Route::get('/terminos-condiciones','PagesController@terminos')->name('terminos-condiciones');
    Route::get('/politica-privacidad','PagesController@politica')->name('politica-privacidad');
    Route::get('/politica-viaje','PagesController@pviaje')->name('politica-viaje');
    Route::get('/libro_reclamos','PagesController@libro_reclamos')->name('libro_reclamos');

    Route::get('/rutas/{ruta}','RutasController@show');
    Route::get('/buscar','PagesController@buscar');
    Route::get('/emprendedor/{sulg}','PagesController@emprendedor');

    Route::get('/registro/{id}', 'PagesController@registro')->name('registro');
    Route::get('/registro', 'PagesController@registro')->name('registro');

    Route::get('/login', 'PagesController@login');
    Route::get('/register', 'PagesController@register');
});

// login

// Route::post('es/login', 'Auth\LoginController@login')->name('login');
// Route::post('es/login', 'Auth\LoginController@login')->name('login');

Route::group(['middleware' => 'auth', 'prefix' => 'es'], function () {

	Route::get('/user/reservas', 'PagesController@showreserva')->name('reservas');
	Route::get('/user/detalle_reserva/{id}', 'PagesController@showdetallereserva')->name('detalle_reserva');
	Route::get('/user/perfil', 'PagesController@showperfil')->name('perfil');
	Route::post('/user/perfil','PagesController@update_perfil')->name('update_perfil');

	Route::get('user/pagar/{id}','PagesController@pagar')->name('pagar');
	Route::post('user/pagar/culquitarjeta','PagesController@culquitarjeta');

	Route::get('actualizar_reserva/{id}','PagesController@actualizar_reserva');
});

Route::group(['middleware' => 'auth', 'prefix' => 'en'], function () {

	Route::get('/user/reservas', 'PagesController@showreserva')->name('reservas');
	Route::get('/user/detalle_reserva/{id}', 'PagesController@showdetallereserva')->name('detalle_reserva');
	Route::get('/user/perfil', 'PagesController@showperfil')->name('perfil');
	Route::post('/user/perfil','PagesController@update_perfil')->name('update_perfil');

	Route::get('user/pagar/{id}','PagesController@pagar')->name('pagar');
	Route::post('user/pagar/culquitarjeta','PagesController@culquitarjeta');

	Route::get('actualizar_reserva/{id}','PagesController@actualizar_reserva');
});


Route::post('/home','PagesController@rutaid');

Route::post('/homedeta','PagesController@rutadescp');
Route::post('/menus/rutas','PagesController@menuid');
Route::post('/emails/create','PagesController@enviarcorreos');
Route::post('/emails/createReclamo','PagesController@createReclamo');

//joan
//Route::get('/registro/{id}', 'PagesController@registro')->name('registro');

Route::get('/donde-ir', function () {
    return view('frontend.donde-ir');
})->name('donde-ir');
//joan
//Route::get('/registro', 'PagesController@registro')->name('registro');

Route::get('/videos', function () {
    return view('frontend.videos');
})->name('videos');

Route::get('/gracias', function () {
    return view('frontend.gracias');
})->name('gracias');

Route::get('resetpassword', function () {
    return view('user.resetpassword');
})->name('resetpassword');

Route::get('resetpass/{id}', function () {
    return view('user.resetpass');
})->name('resetpass');

//login di
// Route::get('es/login/', 'PagesController@login');
// Route::get('en/login/', 'PagesController@login');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback');

Route::post('api/reservar','ReservaController@reservar')->name('reservar');
Route::post('api/reservar_nombres','ReservaController@reservar_nombres')->name('reservar_nombres');
