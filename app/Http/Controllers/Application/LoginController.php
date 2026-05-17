<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(LoginRequest $request)
    {
        $user = User::whereEmail($request->input('email'))->first();
        if($user){
            if(Hash::check($request->input('password'), $user->password )){
                auth()->login($user);
                return redirect()->route('home.page');
            }
        }
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('home.page');
    }
}
