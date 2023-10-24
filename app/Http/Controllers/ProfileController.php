<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function __construct()
    {
        //Make it so only your own profile can be accessed
        $this->middleware('auth');
    }

    public function index()
    {
        //Get the currently authenticated user
        $user = Auth::user();
        return view('profile/profile', compact('user'));
    }

    public function update(Request $request)
    {
        //Get the currently authenticated user
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $user->name = $request->input('name');
        $user->email = $request->input('email');

        //Checks for new password request and update it safely
        if ($request->has('password')) {
            $user->password = bcrypt($request->input('password'));
        }

        $user->save();

        return redirect()->route('profile')->with('success', 'Profile updated successfully.');
    }
}
