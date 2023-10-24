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
        //Change to user / admin
        if ($user->role === 1) {
            $user->role = 2;
        } elseif ($user->role === 2) {
            $user->role = 1;
        }

        $user->save();

        return redirect()->back()->with('success', 'Role changed successfully.');
    }
}
