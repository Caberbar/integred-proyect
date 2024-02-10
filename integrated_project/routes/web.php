<?php

use Illuminate\Support\Facades\Route;
//IMPORT MODELS
use App\Models\User;
use App\Models\Role;
//IMPORT CONTROLLERS
use App\Http\Controllers\ProfesorController;

Route::get('/', function () {
    return view('welcome');
});

/**
 *  --------------------------------
 *      RENDER THE TEACHERS AND INSERT IN THE DATA BASE.
 *  --------------------------------
 */
Route::view('/teacher', 'teacher')->name('teacher');
Route::get('/teacher/create', [ProfesorController::class, 'create'])->name('profesor.create');
Route::post('/teacher/insert', [ProfesorController::class, 'insert'])->name('profesor.insert');
