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
        //Only fetch active projects per 6 for pagination
        $data = Project::where('active', true)->paginate(6);
        return view('projects/projects', ['data' => $data]);
    }

    public function create()
    {
        //Get the currently authenticated user
        $user = Auth::user();
        $loginCount = $user->login_count;

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
        $project->type = $request->input('type');

        if ($request->hasFile('cover')) {
            //Upload cover to storage and store the path to DB
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
        //Check if the logged-in user is the owner of the project
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

        //Find the sample you're updating
        $project = Project::find($project->id);

        if ($request->hasFile('cover')) {
            //Get the old cover from the database
            $oldCoverFilename = $project->cover;

            //Delete old image
            if ($oldCoverFilename) {
                $oldImagePath = storage_path('app/public/projects/covers/' . $oldCoverFilename);

                //Check if the old image exists before deleting
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            //Upload new image to storage, makes the cover editable
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

    public function confirmDelete($id) {
        return view('projects/confirm_delete', ['projectId' => $id]);
    }

    public function destroy($id)
    {
        $project = Project::find($id);
        if (!$project) {
            return redirect('projects')->withError('Project not found or already deleted.');
        }

        $project->delete();
        return redirect('projects')->withSuccess('Delete successful!');
    }

    public function toggle(Project $project)
    {
        //Toggle the project status
        $project->active = !$project->active;
        $project->save();

        return redirect()->back()->with('success', 'Project status toggled successfully.');
    }

    public function search(Request $request)
    {
        //Construct DB query based on input.
        $query = $request->input('query');
        $type = $request->input('type');

        $data = Project::query();

        //Allows for simultaneous use of search and filter
        if ($query) {
            $data->where(function ($queryBuilder) use ($query) {
                $queryBuilder->where('name', 'like', "%$query%")
                    ->orWhere('description', 'like', "%$query%");
            });
        }

        if ($type) {
            $data->where('type', $type);
        }

        //Add pagination here
        $data = $data->paginate(6);

        return view('projects/projects', ['data' => $data]);
    }

}
