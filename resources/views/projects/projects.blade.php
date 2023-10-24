@extends('layouts.web')

@section('title', 'Projects')

@section('content')
    <div class="container">
        <h1>Projects</h1>
        @if(Auth::check() && Auth::user()->login_count >= 3)
            {{-- User is logged in and has at least 3 logins --}}
            <a href="{{ route('projects.create') }}" class="btn btn-info float-end">Upload Project</a>
        @else
            {{-- User does not meet the login count requirement --}}
            <a href="{{ route('projects.create') }}" class="btn btn-danger float-end">Upload Project</a>
        @endif

        <div class="container mt-3">
            <p>All the projects uploaded by the users of this site</p>

            @if(session()->has('success'))
                <div class="alert alert-info">
                    <b>{{ session()->get('success') }}</b>
                </div>
            @endif

            <div class="row row-cols-1 row-cols-md-3 g-3">
                @foreach($data as $dt)
                    <div class="col mb-3">
                        <div class="card">
                            <img class="card-img-top" src="{{ asset('/storage/projects/covers/' . $dt->cover) }}"/>
                            <div class="card-body">
                                <h5 class="card-title">
                                    <span>{{ $dt->name }}</span>
                                </h5>
                                <p class="card-text">
                                    {{ $dt->description }}
                                </p>
                                <p class="card-text">
                                    Type: {{ $dt->type }}
                                </p>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <a href="{{ route('projects.show', $dt->id) }}" class="btn btn-info">Show</a>
                                    @if(Auth::check() && $dt->user_id === Auth::user()->id)
                                        <a href="{{ route('projects.edit', $dt->id) }}" class="btn btn-primary">Edit</a>
                                        <form action="{{ route('projects.destroy', $dt->id) }}" method="post"
                                              style="display:inline" onsubmit="return confirm('Confirm delete')">
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" value="Delete" class="btn btn-danger">
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

