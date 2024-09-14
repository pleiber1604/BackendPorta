<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\SaveUserRequest;

class RegisterController extends Controller
{
    public function register(SaveUserRequest $request)
    {
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
