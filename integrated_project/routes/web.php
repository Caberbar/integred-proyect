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

/**
 *  --------------------------------
 *      RUTAS DE LAS LECCIONES
 *  --------------------------------
 */
Route::view('/lecciones', 'lecciones')->name('lecciones');

/**
 *  --------------------------------
 *      RUTAS DE LOS MODULOS
 *  --------------------------------
 */
Route::view('/modulos', 'modulos')->name('modulos');

/**
 *  --------------------------------
 *      RUTAS DE LOS FORMACIÓN
 *  --------------------------------
 */
Route::view('/formaciones', 'formaciones')->name('formaciones');

/**
 *  --------------------------------
 *      RUTAS DE LOS GRUPOS
 *  --------------------------------
 */
Route::view('/grupos', 'grupos')->name('grupos');

/**
 *  --------------------------------
 *      RUTAS DE LOS ROLES
 *  --------------------------------
 */
Route::view('/rol', 'roles')->name('roles');

/**
 *  --------------------------------
 *      RUTAS DEL LOGIN
 *  --------------------------------
 */
Route::view('/register', 'layout.forms.register')->name('register');
Route::post('/register/save', [UserController::class, 'save'])->name('register.save');

Route::view('/login', 'layout.forms.login')->name('login');
Route::post('/login/confirm', [UserController::class, 'login'])->name('login.confirm');

Route::get('/logout', [UserController::class, 'logout'])->name('logout');

/**
 *  --------------------------------
 *      RUTA DE PERFIL
 *  --------------------------------
 */
Route::view('/profile', 'profile')->name('profile');
Route::view('/settings', 'settings')->name('settings');
Route::view('/chgpasswd', 'chgpasswd')->name('chgpasswd');

/**
 *  --------------------------------
 *      RUTA DE AAÑADIR ROLES
 *  --------------------------------
 */

Route::view('/rol', 'roles')->name('roles');
