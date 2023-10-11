<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventRequest;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        try {
            $credentials = $request->only(['email', 'password']);

            if(Auth::attempt($credentials) === false){
                return response()->json([
                    'message' => "Unauthorized",
                ], 401);
            }

            $user = Auth::user();

            $user->tokens()->delete();
            
            $token = $user->createToken('token', ['events:store']);

            return response()->json($token->plainTextToken);

        } catch (\Throwable $th) {
            return response()->json([
                'error' => $th->getMessage(),
                'message' => "An error ocurred",
            ], 422);
        }
    }
}