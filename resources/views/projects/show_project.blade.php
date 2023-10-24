@extends ('layouts.web')

@section('title', 'Show Project')

@section ('content')
    <div class="container mt-3">
        <a href="{{ route('projects.index') }}" class="btn btn-danger float-end">Back</a>
    </div>

    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ asset('/storage/projects/covers/'.$data->cover) }}" class="card-img-top img-fluid"
                         alt="Project Image">
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            {{--The project information--}}
                            <li class="list-group-item"><Strong>Name:</Strong> {{ $data->name }}</li>
                            <li class="list-group-item"><strong>Description:</strong> {{ $data->description }}</li>
                            <li class="list-group-item"><strong>Type:</strong> {{ $data->type }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

