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
}
