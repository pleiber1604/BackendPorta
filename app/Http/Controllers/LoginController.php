<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginUserRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(LoginUserRequest $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Actualiza la última fecha de inicio de sesión
            $user = Auth::user();
            $user->last_login = now();
            $user->save();

           // return redirect()->intended('dashboard');
           return response()->json([
            'status' => true, 
            'message' => "Usuario logueado exitosamente."
        ],200);
        }
        return response()->json([
            'status' => false, 
            'message' =>"Credenciales incorrectas o usuario no existe."
        ]);
       
    }
}

