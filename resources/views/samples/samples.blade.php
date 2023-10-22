@extends ('layouts.web')

@section('title', 'Samples')

@section ('content')
    <div class="container">
        <h1>Samples</h1>
        <a href="{{ route('samples.create')}}" class="btn btn-info float-end">Upload Sample</a>

        <div class="container mt-3">
            <p>All the samples uploaded by the users of this site</p>

            @if(session()->has('success'))
                <div class="alert alert-info">
                    <b>{{ session()->get('success') }}</b>
                </div>
            @endif

            <div class="row row-cols-1 row-cols-md-3 g-3">
                @foreach($data as $dt)
                    <div class="col mb-3">
                        <div class="card">
                            <img class="card-img-top" src="{{ asset('/storage/samples/covers/'.$dt->cover) }}"/>
                            <div class="card-body">
                                <h5 class="card-title">
                                    <span>{{ $dt->name }}</span>
                                </h5>
                                <h5 class="card-title">
                                    {{--                                will be the mp3 player thing maybe yknow--}}
                                    <span>{{ $dt->audio_file }}</span>
                                </h5>
                                <p class="card-text">
                                    {{ $dt->description }}
                                </p>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <a href="{{ route('samples.show', $dt->id )}}" class="btn btn-info">Show</a>
                                    <a href="{{ route('samples.edit', $dt->id )}}" class="btn btn-primary">Edit</a>
                                    <form action="{{ route('samples.destroy', $dt->id) }}" method="post"
                                          style="display:inline"
                                          onsubmit="confirm('Confirm delete')">
                                        {{--                                        Make the confirmation myself instead of client side--}}
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" value="Delete" class="btn btn-danger">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection
