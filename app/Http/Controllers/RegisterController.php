<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Hash;
class RegisterController extends Controller
{
    public function register(Request $request)
    {
        // Validación de los datos del registro
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'phone_number' => 'string|max:20',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password); // Cifrando password
        $user->phone_number =  $request->phone_number;

        // Manejo de la imagen de perfil
        if ($request->hasFile('profile_image')) {
            $imageName = time().'.'.$request->profile_image->extension();
            $request->profile_image->move(public_path('images'), $imageName);
            $user->profile_image = 'images/'.$imageName; // Guardando la ruta de la imagen
        }       
        $user->save();
    
        return response()->json([
            'status' => true, 
            'message' => "Registration Success"
        ],201);

    }
}
