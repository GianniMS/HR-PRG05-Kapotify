@extends('layouts.web')


@section('title', 'Post manager')

@section('content')
    <div class="container">
        <h1>Post Manager</h1>
        <table class="table">
            <thead>
            <tr>
                <th>Sample Name</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($samples as $sample)
                <tr>
                    <td>{{ $sample->name }}</td>
                    <td>
                        <form action="{{ route('toggle-sample', $sample->id) }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-{{ $sample->active ? 'success' : 'danger' }}">
                                {{ $sample->active ? 'Active' : 'Inactive' }}
                            </button>
                        </form>
                    </td>
                    <td>
                        <a href="{{ route('samples.edit', $sample->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('samples.destroy', $sample->id) }}" method="post"
                              style="display:inline"
                              onsubmit="confirm('Confirm delete')">
                            {{--                                        Make the confirmation myself instead of client side--}}
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Delete" class="btn btn-danger">
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection


{{--post manager needs the toggle on and off for visibility in a table with just the post name and the delete button in the table--}}
