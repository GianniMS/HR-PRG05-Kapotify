<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectManagerController extends Controller
{
    public function index(){
        // Retrieve samples from your database
        $projects = Project::all(); // Replace 'Sample' with your actual model name

        return view('admin/project-manager', compact('projects'));
    }
}
