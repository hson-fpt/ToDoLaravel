<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        dd(Hash::check($password, $user->password));
    }
}
