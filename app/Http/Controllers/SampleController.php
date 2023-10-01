<?php

namespace App\Http\Controllers;

use App\Models\Sample;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SampleController extends Controller
{
    public function index()
    {
        $data = Sample::all();
        return view('samples/samples', ['data'=>$data]);
    }

    public function create()
    {
        return view('samples/create_sample');
    }

    public function store(Request $request)
    {
//        $userId = $request->input('user_id'); ASK ABOUT THIS

            Sample::create([
//                'user_id' => $userId,
                'name' => $request->input('name'),
                'audio_file' => $request->input('audio_file'),
                'description' => $request->input('description'),
                'cover' => $request->input('cover'),
            ]);
        return redirect('samples')->withSuccess('Upload successful!');
    }

    public function show(Sample $sample)
    {
       return view('samples/show_sample', ['data'=>$sample]);
    }

    public function edit(Sample $sample)
    {
        return view('samples/edit_sample', ['data'=>$sample]);
    }

    public function update(Request $request, Sample $sample)
    {
        $sample->update($request->all());
        return redirect('samples')->withSuccess('Update successful!');
    }

    public function destroy(Sample $sample)
    {
        $sample->delete();
        return redirect('samples')->withSuccess('Delete successful!');
    }
}
