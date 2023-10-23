<?php

namespace App\Http\Controllers;

use App\Models\Sample;
use Illuminate\Http\Request;

class PostManagerController extends Controller
{
    public function index(){
        // Retrieve samples from your database
        $samples = Sample::all(); // Replace 'Sample' with your actual model name

        return view('admin/post-manager', compact('samples'));
    }
}
