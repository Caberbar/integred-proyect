<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function save(RegisterRequest $request){
        $userData = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ];
        $user = User::create($userData);
        Auth::login($user);

        return redirect()->route('home');
    }


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
            return  redirect()->route('login.confirm')->with('error', 'Invalid credentials');
        }
    }
}
