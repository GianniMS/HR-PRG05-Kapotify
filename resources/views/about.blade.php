@extends ('layouts/web')

@section('title', 'About')

@section ('content')
    <h1>About</h1>
    <a href="{{ route('home') }}">Home</a>
    <a href="{{ route('about') }}">About</a>
    <a href="{{ route('samples.index') }}">Samples</a>
@endsection
