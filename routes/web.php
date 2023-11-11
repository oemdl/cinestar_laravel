<?php

use App\Http\Controllers\CineStarController;
use Illuminate\Support\Facades\Route;

Route::controller(CineStarController::class)->group( function() {
    Route::get('/', 'index')->name('/');
    Route::get('cines','cines')->name('cines');
    Route::get('cine/{id}','cine')->name('cine');
    Route::get('peliculas/{id}','peliculas')->name('peliculas');
    Route::get('pelicula/{id}','pelicula')->name('pelicula');
});