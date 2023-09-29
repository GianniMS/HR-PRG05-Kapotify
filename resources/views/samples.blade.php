@extends ('layouts/web')

@section('title', 'Samples')

@section ('content')
    <h1>Samples</h1>
    <a href="{{ route('home') }}">Home</a>
    <a href="{{ route('about') }}">About</a>
    <a href="{{ route('samples') }}">Samples</a>
@endsection
