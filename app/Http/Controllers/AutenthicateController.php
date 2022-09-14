<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\LogoutRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AutenthicateController extends Controller
{
    public function register(RegisterRequest $request) {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        return response()->json([
            'res' => true,
            'msg' => 'usuario registrado correctamente'
        ], 200);
    }

    public function login(LoginRequest $request) {
        $user = User::where('email', $request->email)->first();
 
        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'mmssgg' => ['The provided credentials are incorrect.'],
            ]);
        }
    
        /* Paquete Sanctum genera APItoken y necesita el metodo plainTextToken para poder transformar esa informacion del token y usarlo */
        $token =  $user->createToken($request->email)->plainTextToken;
        return response()->json([
            'res' => true,
            'token' => $token,
            'usuario' => $user,
        ], 200);
    }

    public function logout(Request $request) {
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'res' => true,
            'msg' => 'Token ELiminado correctamente',
        ], 200);
    }
}
