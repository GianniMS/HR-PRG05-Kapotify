<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

class UserListController extends Controller
{
    public function index(){
            $users = User::all();

            return view('admin/user-list', compact('users'));
        }

    public function changeRole(User $user)
    {
        if ($user->role === 1) {
            $user->role = 2; // Change to User
        } elseif ($user->role === 2) {
            $user->role = 1; // Change to Admin
        }

        $user->save();

        return redirect()->back()->with('success', 'Role changed successfully.');
    }
}
