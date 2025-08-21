<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function show($id)
    {

        $user = User::findOrFail($id);
        $profile = $user->profile;
        return view('pages.profile.profile', compact('user', 'profile'));
    }

    public function updatePhoto(Request $request, $id)
    {
        $request->validate([
            'profile_picture' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $user = User::findOrFail($id);


        if ($user->profile && $user->profile->profile_picture) {
            Storage::delete('public/' . $user->profile->profile_picture);
        }



        $path = $request->file('profile_picture')->store('profiles', 'public');


        $user->profile()->updateOrCreate(
            ['user_id' => $user->id],
            ['profile_picture' => $path]
        );

        return back()->with('success', 'Foto profil berhasil diperbarui.');
    }
}
