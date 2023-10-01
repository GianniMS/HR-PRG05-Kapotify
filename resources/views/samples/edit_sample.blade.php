@extends ('layouts.web')

@section('title', 'Edit Sample')

@section ('content')
    <div class="container mt-3">
        <h3>Edit your sample:</h3>
        <div class="col-md-12">
            <div class="col-md-6">
                <form action="{{ route('samples.update', $data->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                    <div class="mb-3 mt-3">
                        <label for="name" class="form-label">Name:</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter name"
                               value="{{ $data->name }}" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="audio_file" class="form-label">Audio_file:</label>
                        {{--            input type will be changed when audio file implementation--}}
                        <input type="text" class="form-control" id="audio_file" placeholder="Upload audio_file"
                               value="{{ $data->audio_file }}" name="audio_file">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description:</label>
                        <input type="text" class="form-control" id="description" placeholder="Enter description"
                               value="{{ $data->description }}"
                               name="description">
                    </div>
                    <div class="mb-3">
                        <label for="cover" class="form-label">Cover:</label>
                        {{--            input type will be changed when audio file implementation--}}
                        <input type="text" class="form-control" id="cover" placeholder="Upload cover"
                               value="{{ $data->cover }}"name="cover">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
