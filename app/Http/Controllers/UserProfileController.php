<?php

namespace App\Http\Controllers;

use App\Rules\PhoneNumberRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserProfileController extends Controller
{
    public function __construct()
    {
        return view()->share('title', 'Data Profile');
    }

    public function userProfile(Request $request)
    {
        $token = $request->route()->parameter('token');
        $user = auth()->user();
        return view('dashboard.user-profile.user-profile', compact('user', 'token'));
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'password' => 'required|confirmed|min:8',
        ]);
        $user = Auth::user();
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect()->route('user.profile')->with('success', 'Password has been updated.');
    }


    public function updateprofile(Request $request)
    {
        $user = Auth::user();
        $validated = $request->validate([
            'name' => 'required|max:255|string',
            'username' => [
                'required',
                'regex:/^\S*(?=\S*\d)(?=\S*[a-zA-Z])\S*$/',
                'unique:users,username,' . $user->id
            ],
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => ['required', new PhoneNumberRule],
            'image' => 'nullable|image|max:2048',
        ]);
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->phone = $request->phone;
        if ($request->hasFile('image')) {
            if ($user->image) {
                Storage::delete($user->image);
            }
            $user->image = $request->file('image')->store('user-profiles');
        }
        $user->save();
        return redirect()->route('user.profile')->with('success', 'Profil has been updated.');
    }
}
