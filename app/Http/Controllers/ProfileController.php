<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\ValidationException;

class ProfileController extends Controller
{
    public function index()
    {
        return view('admin.profile.index')->with([
            'user' => Auth::user()
        ]);
    }

    public function edit()
    {
        return view('admin.profile.edit')->with([
            'user' => Auth::user(),
            'roles' => Role::all(),
        ]);
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'first_name' => ['nullable', 'string', 'max:255'],
            'last_name' => ['nullable', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'regex:/^\+?[0-9]{10,15}$/', 'max:15', 'unique:users,phone,' . $user->id],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'avatar' => ['nullable', 'image', 'max:2048'],
        ]);

        if ($request->hasFile('avatar')) {
            if ($user->avatar && Storage::disk('public')->exists($user->avatar)) {
                Storage::disk('public')->delete($user->avatar);
            }

            $avatarPath = $request->file('avatar')->store('avatars', ['disk' => 'public']);
            $validated['avatar'] = $avatarPath;
        }


        $user->update($validated);

        return redirect()->route('profile.view')->with('success', 'Profile updated successfully!');


    }

    public function password_change(Request $request)
    {
     return view('admin.profile.password');
    }

    public function password_update(Request $request)
    {
        $request->validate([
            'current_password' => ['required'],
            'password' => ['required', 'confirmed', 'min:8', 'different:current_password'],
        ]);

        $user = auth()->user();

        if (!Hash::check($request->current_password, $user->password)) {
            throw ValidationException::withMessages([
                'current_password' => 'The current password is incorrect.',
            ]);
        }

        $user->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.profile.view')->with('success', 'Password changed successfully!');
        }
}
