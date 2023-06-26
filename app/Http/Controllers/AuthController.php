<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view("auth.login");
    }
    public function doLogin(Request $request)
    {
        $credentials = $request->only("email", "password");
        if (auth()->attempt($credentials)) {
            notify()->success("Login Successful", "Welcome Back");
            return to_route("dashboard");
        }
        notify()->error("Login Failed", "Invalid Credentials");
        return to_route("login");
    }
}