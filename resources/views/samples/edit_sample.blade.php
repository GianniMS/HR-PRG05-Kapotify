@extends ('layouts.web')

@section('title', 'Edit Sample')

@section ('content')
    <div class="container mt-3">
        <a href="{{ route('samples.index') }}" class="btn btn-danger float-end">Back</a>
        <h3>Edit your sample:</h3>
        <div class="col-md-12">
            <div class="col-md-6">
                <form action="{{ route('samples.update', $data->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
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
                        <label for="audio_file" class="form-label">Audio_file:</label>
                        {{--            input type will be changed when audio file implementation--}}
                        <input type="text" class="form-control @error('audio_file') is-invalid @enderror"
                               id="audio_file" placeholder="Upload audio_file"
                               value="{{ $data->audio_file }}" name="audio_file">
                        @error('audio_file')
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
                        <label for="cover" class="form-label">Cover:
                            <img height="100px" width="100px"
                                 src="{{ asset('/storage/samples/covers/'.$data->cover) }}"/>
                        </label>
{{--                        <input type="file" class="form-control @error('cover') is-invalid @enderror" id="cover"--}}
{{--                               name="cover">--}}
{{--                        @error('cover')--}}
{{--                        <div class="invalid-feedback">--}}
{{--                            {{ $message }}--}}
{{--                        </div>--}}
{{--                        @enderror--}}
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
