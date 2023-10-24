@extends('layouts.web')


@section('title', 'Project manager')

@section('content')
    <div class="container">
        <h1>Project Manager</h1>
        <table class="table">
            <thead>
            <tr>
                <th>Project Name</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($projects as $project)
                <tr>
                    <td>{{ $project->name }}</td>
                    <td>
                        <form action="{{ route('toggle-project', $project->id) }}" method="post">
                            @csrf
                            {{--Active to inactive / inactive to active toggle button--}}
                            <button type="submit" class="btn btn-{{ $project->active ? 'success' : 'danger' }}">
                                {{ $project->active ? 'Active' : 'Inactive' }}
                            </button>
                        </form>
                    </td>
                    <td>
                        <form action="{{ route('projects.destroy', $project->id) }}" method="post"
                              style="display:inline"
                              onsubmit="confirm('Confirm delete')">
                            {{--Make the confirmation myself instead of client side--}}
                            @csrf
                            {{--Delete other users post--}}
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
