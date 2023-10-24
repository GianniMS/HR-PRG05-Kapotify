@extends('layouts.web')

@section('title', 'Projects')

@section('content')
    <div class="container">
        <h1>Projects</h1>
        <div class="row">
            <div class="col-md-6">
                {{--Searchbar and filter--}}
                <form action="{{ route('projects.search') }}" method="GET">
                    <div class="input-group mb-3">
                        {{--The searchbar--}}
                        <input type="text" name="query" class="form-control" placeholder="Search by name or description"
                               value="{{ request('query') }}">
                        {{--The filter--}}
                        <select name="type" class="form-select">
                            <option value="" selected>Filter by Type</option>
                            <option value="album" {{ request('type') === 'album' ? 'selected' : '' }}>Album</option>
                            <option value="single" {{ request('type') === 'single' ? 'selected' : '' }}>Single</option>
                        </select>
                        {{--A button for both search and filter to use both simultaniously--}}
                        <button class="btn btn-primary" type="submit">Search & Filter</button>
                    </div>
                </form>
            </div>
            <div class="col-md-3">
                {{--If there is a query the button will show all projects--}}
                @if(request('query') || request('type'))
                    <a href="{{ route('projects.index') }}" class="btn btn-primary">Show All</a>
                    {{--                    If there is no query the button willl display all shown--}}
                @else
                    <a href="" class="btn btn-outline-primary">All Shown</a>
                @endif
            </div>
        </div>
        <div class="container mt-3">
            <div class="container mt-3 mb-3">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="mb-0">All the projects uploaded by the users of this site</h3>
                    </div>
                    <div class="col-md-6 d-flex justify-content-between">
                        {{--Checks if the user has at least 3 logins, if not the button will display differently--}}
                        @if(Auth::check() && Auth::user()->login_count >= 3)
                            <a href="{{ route('projects.create') }}" class="btn btn-primary">Upload Project</a>
                        @else
                            <a href="{{ route('projects.create') }}" class="btn btn-outline-danger">Upload Project</a>
                        @endif
                    </div>
                </div>
            </div>
            {{--Alert when succesfull--}}
            @if(session()->has('success'))
                <div class="alert alert-info">
                    <b>{{ session()->get('success') }}</b>
                </div>
            @endif
            <div class="row row-cols-1 row-cols-md-3 g-3">
                {{--Loop through all the projects and display them on a card--}}
                @foreach($data as $dt)
                    <div class="col mb-3">
                        <div class="card">
                            <img class="card-img-top" src="{{ asset('/storage/projects/covers/' . $dt->cover) }}"/>
                            <div class="card-body">
                                <h3 class="card-title">
                                    <span>{{ $dt->name }}</span>
                                </h3>
                                <div class="row">
                                    <div class="col">
                                        {{--The action buttons--}}
                                        <a href="{{ route('projects.show', $dt->id) }}" class="btn btn-primary">Show</a>
                                        {{--Only the user that posted the project has access to these buttons--}}
                                        @if(Auth::check() && $dt->user_id === Auth::user()->id)
                                            <a href="{{ route('projects.edit', $dt->id) }}"
                                               class="btn btn-success">Edit</a>
                                            {{--Link to confirm delete--}}
                                            <a href="{{ route('projects.confirmDelete', $dt->id) }}"
                                               class="btn btn-danger">Delete</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

