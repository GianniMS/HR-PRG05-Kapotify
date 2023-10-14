@extends ('layouts.web')

@section('title', 'Show Sample')

@section ('content')
<div class="container mt-3">
    <h3 class="text-center">{{ $data->name }}</h3>
    <a href="{{ route('samples.index') }}" class="btn btn-danger float-end">Back</a>
    <div class="col-md-6">
        <p><b>Audio_file: </b> {{ $data->audio_file }}</p>
        <p><b>Description: </b> {{ $data->description }}</p>
        <p><b>Cover: </b> <img height="100px" width="100px" src="{{ asset('/storage/samples/covers/'.$data->cover) }}"/></p>
    </div>
</div>
@endsection
