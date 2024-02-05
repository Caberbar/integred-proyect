<?php

use Illuminate\Support\Facades\Route;

use App\Models\User;
use App\Models\Role;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/create', function() {
    $role = new Role();
    $role->name = "Admin";
    $role->save();
    
    $role = new Role();
    $role->name = "Registrado";
    $role->save();
    
    $role = new Role();
    $role->name = "Invitado";
    $role->save();

    $user = new User();
    $user->name = "Mario";
    $user->email = "mario@gmail.com";
    $user->password = "1234";
    $user->save();

    $user = new User();
    $user->name = "Admin";
    $user->email = "admin@gmail.com";
    $user->password = "1234";
    $user->save();

    $user = new User();
    $user->name = "Inv";
    $user->email = "invitado@gmail.com";
    $user->password = "1234";
    $user->save();

    return "Se han creado los registros";
});

Route::get('/rolear', function() {
    $admin = Role::whereName('Admin')->first();
    $regis = Role::whereName('Registrado')->first();
    $inv = Role::whereName('Invitado')->first();

    $roles = [1, 2, 3];

    $usuario = User::whereName('Mario')->first();
    $usuario->roles()->attach($roles);

    return $usuario;
});