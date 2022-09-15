<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\LogoutRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\Role;
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

        $user->roles()->attach($request->roles);

        return response()->json([
            'res' => true,
            'msg' => 'usuario registrado correctamente'
        ], 200);
    }

    /* Added method of register role */
    public function registerRole(Request $request) {
        $role = new Role();
        $role->name = $request->name;
        $role->description = $request->description;
        $role->save();

        return response()->json([
            'res' => true,
            'msg' => 'Rol registrado correctamente'
        ], 200);
    }

    /* Show roles of $user */
    public function showRolesUser() {
        $user = User::find(1);
 
        foreach ($user->roles as $role) {
            return response()->json([
                'user' => $user->name,
                'roles' => $role->all("name")
            ], 200);
        }
    }

    public function login(LoginRequest $request) {
        $user = User::with('roles')->where('email', $request->email)->first();
 
        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'mmssgg' => ['The provided credentials are incorrect.'],
            ]);
        }
    
        /* Paquete Sanctum genera APItoken y necesita el metodo plainTextToken para poder transformar esa informacion del token y usarlo */
        $token =  $user->createToken($request->email)->plainTextToken;
        return response()->json([
            'res' => true,
            'msg' => [
                'token' => $token,
                'usuario' => $user,
            ]
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
