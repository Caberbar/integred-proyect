<?php

use Illuminate\Support\Facades\Route;
//IMPORT MODELS
use App\Models\User;
use App\Models\Role;
//IMPORT CONTROLLERS
use App\Http\Controllers\ProfesorController;
use App\Http\Controllers\leccionController;
use App\Http\Controllers\ModuloController;
use App\Http\Controllers\FormacionController;
use App\Http\Controllers\GrupoController;
use App\Http\Controllers\UserController;


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
/**
 *  --------------------------------
 *      RUTAS DE LAS LECCIONES
 *  --------------------------------
 */
Route::view('/lecciones', 'lecciones')->name('lecciones');
Route::get('/lecciones/create', [LeccionController::class, 'create'])->name('lecciones.create');
Route::post('/lecciones/insert', [LeccionController::class, 'insert'])->name('lecciones.insert');
/**
 *  --------------------------------
 *      RUTAS DE LOS MODULOS
 *  --------------------------------
 */
Route::view('/modulos', 'modulos')->name('modulos');
Route::get('/modulos/create', [ModuloController::class, 'create'])->name('modulos.create');
Route::post('/modulos/insert', [ModuloController::class, 'insert'])->name('modulos.insert');
/**
 *  --------------------------------
 *      RUTAS DE LOS FORMACIÓN
 *  --------------------------------
 */
Route::view('/formaciones', 'formaciones')->name('formaciones');
Route::get('/formaciones/create', [FormacionController::class, 'create'])->name('formaciones.create');
Route::post('/formaciones/insert', [FormacionController::class, 'insert'])->name('formaciones.insert');
/**
 *  --------------------------------
 *      RUTAS DE LOS GRUPOS
 *  --------------------------------
 */
Route::view('/grupos', 'grupos')->name('grupos');
Route::get('/grupos/create', [GrupoController::class, 'create'])->name('grupos.create');
Route::post('/grupos/insert', [GrupoController::class, 'insert'])->name('grupos.insert');

/**
 *  --------------------------------
 *      RUTAS DEL LOGIN
 *  --------------------------------
 */
Route::view('/register', 'layout.forms.register')->name('register');
Route::post('/register/save', [UserController::class, 'save'])->name('register.save');

Route::view('/login', 'layout.forms.login')->name('login');
Route::post('/login/confirm', [UserController::class, 'login'])->name('login.confirm');
