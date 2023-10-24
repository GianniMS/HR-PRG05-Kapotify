@extends ('layouts.web')

@section('title', 'Show Project')

@section ('content')
<div class="container mt-3">
    <h3 class="text-center">{{ $data->name }}</h3>
    <a href="{{ route('projects.index') }}" class="btn btn-danger float-end">Back</a>
    <div class="col-md-6">
        <p><b>Description: </b> {{ $data->description }}</p>
        <p><b>Type: </b> {{ $data->type }}</p>
        <p><b>Cover: </b> <img height="100px" width="100px" src="{{ asset('/storage/projects/covers/'.$data->cover) }}"/></p>
    </div>
</div>
@endsection
