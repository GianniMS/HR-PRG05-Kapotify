<?php

namespace App\Http\Controllers;

use App\Models\Sample;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SampleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index()
    {
        $data = Sample::all();
        return view('samples/samples', ['data' => $data]);
    }

    public function create()
    {
        return view('samples/create_sample');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'audio_file' => 'required',
            'description' => 'required',
            'cover' => 'required',
        ]);

        $sample = new Sample();
        $sample->user_id = Auth::id();
        $sample->name = $request->input('name');
        $sample->audio_file = $request->input('audio_file');
        $sample->description = $request->input('description');

        if ($request->hasFile('cover')) {
            $destination_path = 'public/samples/covers';
            $cover = $request->file('cover');
            $cover_name = $cover->getClientOriginalName();
            $path = $request->file('cover')->storeAs($destination_path, $cover_name);

            $sample['cover'] = $cover_name;
        }

        $sample->save();

        return redirect('samples')->withSuccess('Upload successful!');
    }

    public function show(Sample $sample)
    {
        return view('samples/show_sample', ['data' => $sample]);
    }

    public function edit(Sample $sample)
    {
        return view('samples/edit_sample', ['data' => $sample]);
    }

    public function update(Request $request, Sample $sample)
    {
        $request->validate([
            'name' => 'required',
            'audio_file' => 'required',
            'description' => 'required',
//            'cover' => 'required',
        ]);

        $sample->update($request->all());

        return redirect('samples')->withSuccess('Update successful!');
    }

    public function destroy(Sample $sample)
    {
        $sample->delete();
        return redirect('samples')->withSuccess('Delete successful!');
    }
}
