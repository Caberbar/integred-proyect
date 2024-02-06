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

Route::get('/rolear2', function() {
    $admin = Role::whereName('Admin')->first();
    $usuario = User::whereName('Mario')->first();
    $admin->users()->attach($usuario);
});

Route::get('/rolear', function() {
    $admin = Role::whereName('Admin')->first();
    $regis = Role::whereName('Registrado')->first();
    $inv = Role::whereName('Invitado')->first();

    $usuarios = [];
    $usuarios[0] = User::whereName('Mario')->first();
    $usuarios[0]->roles()->attach($regis);
    
    $usuarios[1] = User::whereName('Admin')->first();
    $usuarios[1]->roles()->attach($admin);
    $usuarios[1]->roles()->attach($regis);
    
    $usuarios[2] = User::whereName('Inv')->first();
    $usuarios[2]->roles()->attach($inv);

    return $usuarios;
});

Route::get('/show', function() {
    $usuarios = User::all();
    return $usuarios[0]->roles;
});

Route::get('/showRole', function() {
    $regis = Role::whereName('Registrado')->first();
    return $regis->users;
});