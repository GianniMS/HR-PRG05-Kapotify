@extends ('layouts.web')

@section('title', 'Edit Projecy')

@section ('content')
    <div class="container mt-3">
        <a href="{{ route('projects.index') }}" class="btn btn-danger float-end">Back</a>
        <h3>Edit your project:</h3>
        <div class="col-md-12">
            <div class="col-md-6">
                <form action="{{ route('projects.update', $data->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    {{--Every element keeps the previous information when there is an input validation error--}}
                    @method('PUT')
                    <div class="mb-3 mt-3">
                        <label for="name" class="form-label">Name:</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                               placeholder="Enter name"
                               value="{{ $data->name }}" name="name">
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
                               value="{{ $data->description }}"
                               name="description">
                        @error('description')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="type" class="form-label">Type:</label>
                        <select class="form-select @error('type') is-invalid @enderror" id="type" name="type">
                            <option value="single" {{ $data->type === 'single' ? 'selected' : '' }}>Single</option>
                            <option value="album" {{ $data->type === 'album' ? 'selected' : '' }}>Album</option>
                        </select>
                        @error('type')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="cover" class="form-label">Cover:
                            {{--Displays the previous cover--}}
                            <img height="100px" width="100px"
                                 src="{{ asset('/storage/projects/covers/'.$data->cover) }}"/>
                        </label>
                        <input type="file" class="form-control @error('cover') is-invalid @enderror" id="cover"
                               name="cover">
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
@endsection
