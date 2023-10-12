@extends ('layouts.web')

@section('title', 'Samples')

@section ('content')
    <h1>Samples</h1>
    <a href="{{ route('home') }}">Home</a>
    <a href="{{ route('about') }}">About</a>
    <a href="{{ route('samples.index') }}">Samples</a>

    <a href="{{ route('samples.create')}}" class="btn btn-info float-end">Upload Sample</a>

    <div class="container mt-3">
        <h2>All Samples</h2>
        <p>All the samples uploaded by the users of this site</p>

        @if(session()->has('success'))
        <div class="alert alert-info">
            <b>{{ session()->get('success') }}</b>
        </div>
        @endif

        <table class="table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Audio_file</th>
                <th>Description</th>
                <th>Cover</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $dt)
            <tr>
                <td>{{ $dt->name }}</td>
                <td>{{ $dt->audio_file }}</td>
                <td>{{ $dt->description }}</td>
                <td><img height="100px" width="100px" src="{{ asset('/storage/samples/covers/'.$dt->cover) }}"/></td>
                <td>
                    <a href="{{ route('samples.show', $dt->id )}}" class="btn btn-info">Show</a>
                    <a href="{{ route('samples.edit', $dt->id )}}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('samples.destroy', $dt->id) }}" method="post" style="display:inline" onsubmit="confirm('Confirm delete')">
{{--                        Make the confirmation myself instead of client side--}}
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
