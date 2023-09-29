@extends ('layouts/web')

@section('title', 'Samples')

@section ('content')
    {{--    Turn this part into a partial with a dynamic H1--}}
    <h1>Samples</h1>
    <a href="{{ route('home') }}">Home</a>
    <a href="{{ route('about') }}">About</a>
    <a href="{{ route('samples') }}">Samples</a>

    <div>
        {{--        Crud --}}
    </div>
@endsection
