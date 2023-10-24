@extends ('layouts.web')

@section('title', 'Create Project')

@section ('content')
    @if(Auth::check() && Auth::user()->login_count >= 3)
        <div class="container mt-3">
            <a href="{{ route('projects.index') }}" class="btn btn-danger float-end">Back</a>
            <h3>Upload your project:</h3>
            <div class="col-md-12">
                <div class="col-md-6">
                    <form action="{{ route('projects.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3 mt-3">
                            <label for="name" class="form-label">Name:</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                   placeholder="Enter name" name="name" value="{{ old('name') }}">
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description:</label>
                            <input type="text" class="form-control @error('description') is-invalid @enderror"
                                   id="description" placeholder="Enter description"
                                   name="description" value="{{ old('description') }}">
                            @error('description')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="type" class="form-label">Type:</label>
                            <select class="form-select @error('type') is-invalid @enderror" id="type" name="type">
                                <option value="single" {{ old('type') === 'single' ? 'selected' : '' }}>Single</option>
                                <option value="album" {{ old('type') === 'album' ? 'selected' : '' }}>Album</option>
                            </select>
                            @error('type')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="cover" class="form-label">Cover:</label>
                            <input type="file" class="form-control @error('cover') is-invalid @enderror" id="cover"
                                   name="cover" value="{{ old('cover') }}">
                            @error('cover')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    @else
{{--        Incase someone deeplinks to this page--}}
        <div class="container mt-3">
            <div class="alert alert-danger">
                <b>Need to login atleast 3 times! You only logged in {{ $loginCount }} times</b>
            </div>
            <a href="{{ route('projects.index') }}" class="btn btn-danger float-end">Back</a>
        </div>
    @endif
@endsection
