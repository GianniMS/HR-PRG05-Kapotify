<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SampleController extends Controller
{
    public function index(){
        return view('samples');
    }

    public function create(){
        return view('create');
    }

    public function store(){
        //
    }
}
