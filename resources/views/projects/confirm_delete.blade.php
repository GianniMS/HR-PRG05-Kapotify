@extends('layouts.web')

@section('title', 'Confirm Delete')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-center">
            <div class="card col-md-4">
                <div class="card-header text-center">
                    <h1>Confirm deletion</h1>
                </div>
                <div class="card-body text-center">
                    <h4>Are you sure you want to delete this project?</h4>
                    <h4>This action can't be undone!</h4>
                    <form action="{{ route('projects.destroy', $projectId) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                        <a href="{{ route('projects.index') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

