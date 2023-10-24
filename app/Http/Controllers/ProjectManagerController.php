<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectManagerController extends Controller
{
    public function index(){
        //Retrieve projects from DB
        $projects = Project::all();

        return view('admin/project-manager', compact('projects'));
    }
}
