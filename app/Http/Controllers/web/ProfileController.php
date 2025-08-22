<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Profile;
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

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'username' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:500',
            'date_of_birth' => 'nullable|date',
            // 'profile_picture' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'bio' => 'nullable|string|max:500',
            'facebook' => 'nullable|url|max:255',
            'twitter' => 'nullable|url|max:255',
            'instagram' => 'nullable|url|max:255',
            'linkedin' => 'nullable|url|max:255',
            'website' => 'nullable|url|max:255'
        ]);

        $user = User::findOrFail($id);

        // update tabel users
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        // update atau buat profil baru kalau belum ada
        $profile = $user->profile ?? new Profile(['user_id' => $user->id]);

        $profile->fill($request->only([
            'username',
            'phone',
            'address',
            'date_of_birth',
            'bio',
            'facebook',
            'twitter',
            'instagram',
            'linkedin',
            'website'
        ]));

        // // handle upload profile picture
        // if ($request->hasFile('profile_picture')) {
        //     $filename = time() . '.' . $request->profile_picture->extension();
        //     $request->profile_picture->storeAs('profile_pictures', $filename, 'public');
        //     $profile->profile_picture = $filename;
        // }

        $profile->save();

        return back()->with('success', 'Profil berhasil diperbarui.');
    }
}
