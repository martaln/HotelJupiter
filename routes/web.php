<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*Ruta - traducciones*/
Route::get('lang/{locale}', 'App\Http\Controllers\localizationController@setLocale')->name('locale.set');

Route::get('/', 'App\Http\Controllers\indexController@index');

Route::get('galeria', function () {
    return view('galeriaView');
});

Route::get('habitaciones', function () {
    return view('habitacionesView');
});

Route::get('servicios', function () {
    return view('serviciosView');
});
Route::get('legal', function () {
    return view('legalView');
});


Route::get('reservas', 'App\Http\Controllers\reservasController@index');
