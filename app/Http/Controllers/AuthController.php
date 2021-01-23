<?php

namespace App\Http\Controllers;

use App\Models\Token;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\User;


class AuthController extends Controller
{
    function login(Request $request)
    {
        $username = $request["username"];
        $password = $request["password"];

        $user = User::where("username", $username)->first();
        if(Hash::check($password, $user->password)) {
            $token = app(Token::class);
            $token->user_id = $user->id;
            $token->value = Str::random(60);
            $token->save();
        }
    }
}
