<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\EditRequest;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function profile_edit(User $profile, EditRequest $request)
    {
        if($request->hasFile('avatar')){
            $pathToAvatarUser = '/storage/user_avatars/' . $request->file('avatar')->hashName();
            $request->file('avatar')->store('user_avatars');
            Storage::disk('public')->delete(str_replace('/storage/', '', $profile->avatar_image));
        }

        $profile->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'is_admin' => $request->boolean('isAdmin'),
            'avatar_image' => $pathToAvatarUser ?? $profile->avatar_image
        ]);

        return redirect()->route('profile.page', $profile->id);
    }
}
