<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

//use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index()
    {
        $data = Project::where('active', true)->get(); // Fetch only active samples
        return view('projects/projects', ['data' => $data]);
    }

    public function create()
    {
        $user = Auth::user(); // Get the currently authenticated user
        $loginCount = $user->login_count; // Assuming 'login_count' is the name of the field

        return view('projects/create_project', compact('loginCount'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'type' => 'required|in:single,album',
            'cover' => ['required', 'mimes:jpg,jpeg,png'],
        ]);

        $project = new Project();
        $project->user_id = Auth::id();
        $project->name = $request->input('name');
        $project->description = $request->input('description');

        if ($request->hasFile('cover')) {
            $destination_path = 'public/projects/covers';
            $cover = $request->file('cover');
            $cover_name = $cover->getClientOriginalName();
            $path = $request->file('cover')->storeAs($destination_path, $cover_name);

            $project['cover'] = $cover_name;
        }

        $project->save();

        return redirect('projects')->withSuccess('Upload successful!');
    }

    public function show(Project $project)
    {
        return view('projects/show_project', ['data' => $project]);
    }

    public function edit(Project $project)
    {
        // Check if the logged-in user is the owner of the project
        if (Auth::user()->id !== $project->user_id) {
            abort(403, 'Unauthorized'); // Return a 403 Forbidden response if not authorized
        }

        return view('projects/edit_project', ['data' => $project]);
    }

    public function update(Request $request, Project $project)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'type' => 'required|in:single,album',
            'cover' => ['image', 'mimes:jpg,jpeg,png'],
        ]);

        // Find the sample you're updating
        $project = Project::find($project->id);

        if ($request->hasFile('cover')) {
            // Delete old image

            // Upload new image to storage
            $destination_path = 'public/projects/covers';
            $cover = $request->file('cover');
            $cover_name = $cover->getClientOriginalName();
            $path = $request->file('cover')->storeAs($destination_path, $cover_name);

            $project->cover = $cover_name;
        }

        $project->name = $request->input('name');
        $project->description = $request->input('description');
        $project->type = $request->input('type');

        $project->save();

        return redirect('projects')->withSuccess('Update successful!');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return redirect('projects')->withSuccess('Delete successful!');
    }

    public function toggle(Project $project)
    {
        // Logic to toggle the sample's status
        $project->active = !$project->active;
        $project->save();

        return redirect()->back()->with('success', 'Project status toggled successfully.');
    }

}
