<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;

class RegisterController extends Controller
{
    public function register(RegisterRequest $request)
    {
        if($request->hasFile('avatar')){
            $pathToAvatarUser = '/storage/user_avatars/' . $request->file('avatar')->hashName();
            $request->file('avatar')->store('user_avatars');
        }

        User::create([
           'name' => $request->input('name'),
           'email' => $request->input('email'),
           'password' => $request->input('password'),
           'is_admin' => $request->boolean('isAdmin'),
           'avatar_image' => $pathToAvatarUser ?? null
        ]);

        return redirect()->route('login.page');
    }
}
