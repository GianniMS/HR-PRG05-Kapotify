<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostManagerController extends Controller
{
    public function index(){
        return view('admin/post-manager');
    }
}
