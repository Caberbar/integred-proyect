<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * REGISTRAR USUARIOS
     *
     * 1.Los datos del form se filtran por las customRequest, si son validos se crea el usuario
     * 2.Comprobamos si el usuario tiene el rol de registrado asignado por seguridad y en caso de que no se lo asignamos
     * 3.Logeamos al usuario que acaba de crear la cuenta y lo redirigimos al home.
     */
    public function save(RegisterRequest $request){
        $userData = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ];
        $user = User::create($userData);
        $role = Role::where('name', 'Register')->first();
        if ($role) {
            $user->roles()->attach($role);
        }
        Auth::login($user);

        return redirect()->route('home');
    }

    /**
     *  1.Los datos del form se filtran por las customRequest, si son validos se almacenan estos
     *  2.Comprobamos si el usuario quiere que mantengamos su sesión activa o no
     *  3.Hacemos la comprobacion de que el usuario tenga cuenta y si es asi, le redirigimos al home, en caso contrario le mostramos
     *  de nuevo el formulario de inicio de sesión con un mensaje de error.
     */
    public function login(LoginRequest $request){
        $credentials = [
            'email'=>$request->email,
            'password'=>$request->password,
        ];
        $remember = ($request->remember ? true : false);

        if(Auth::attempt($credentials, $remember)){
            $request->session()->regenerate();
            return redirect()->intended(route('home'));
        }else{
            return redirect()->route('login')->with('error', 'Invalid credentials');
        }
    }

    /**
     *  Cogemos los datos del usuario que tiene la sesión activa y lo deslogeamos
     */
    public function logout() {
        Auth::logout();
        return redirect()->intended(route('home'));
    }
}
