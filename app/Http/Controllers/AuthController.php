<?php

namespace App\Http\Controllers;

use App\Models\AccessKey;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
 public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (!Auth::attempt($request->only('email', 'password'))) {
        return response()->json(['error' => 'Credenciais inválidas'], 401);
    }

    $user = Auth::user();
    $token = $user->createToken('API Token')->plainTextToken;

    return response()->json([
        'token' => $token,
        'user' => $user
    ]);
}


public function definirSenha(Request $request)
{
    $request->validate([
        'user_id' => 'required|exists:users,id',
        'password' => 'required|min:6|confirmed',
    ]);

    $user = User::findOrFail($request->user_id);
    $user->password = Hash::make($request->password);
    $user->must_change_password = false;
    $user->save();

    return response()->json(['message' => 'Senha definida com sucesso']);
}

public function logout(Request $request)
{
    $request->user()->currentAccessToken()->delete();

    return response()->json(['message' => 'Logout realizado com sucesso']);
}


}
