<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Whoops\Handler\PlainTextHandler;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $user = User::where('username',$request->username)->first();

        if(!$user || !Hash::check($request->password,$user->password))
        {
            return response()->json([
                'message' => "Unauthorized"
            ],401 );
        }

        $token = $user->createToken('token-name')->plainTextToken;

        return response()->json([
            "message"   => "success",
            "user"      => $user,
            "token"     => $token
        ],200);
    }

    public function logout(Request $request)
    {
        // $a = Auth::user()->id;
        dd($request);
        return response()->json(['message' => 'success']);
    }
}
