<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function __construct()
    {
//        Make it so only your own profile can be accessed
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user(); // Get the currently authenticated user
        return view('profile/profile', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user(); // Get the currently authenticated user

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $user->name = $request->input('name');
        $user->email = $request->input('email');

        if ($request->has('password')) {
            $user->password = bcrypt($request->input('password'));
        }

        $user->save();

        return redirect()->route('profile')->with('success', 'Profile updated successfully.');
    }
}
