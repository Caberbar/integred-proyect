<?php

use Illuminate\Support\Facades\Route;
//IMPORT MODELS
use App\Models\User;
use App\Models\Role;
//IMPORT CONTROLLERS
use App\Http\Controllers\ProfesorController;
/**
 *  ------------------------------------------------------
 *      RUTA INICIAL DE LA APLICACIÓN -> INDEX
 *  ------------------------------------------------------
 */
Route::view('/', 'index')->name('home');

/**
 *  --------------------------------
 *      RUTAS DE LOS PROFESORES
 *  --------------------------------
 */
Route::view('/profesor', 'profesor')->name('profesor');
Route::get('/profesor/create', [ProfesorController::class, 'create'])->name('profesor.create');
Route::post('/profesor/insert', [ProfesorController::class, 'insert'])->name('profesor.insert');
