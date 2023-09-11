@extends ('layouts/web')

@section('title', 'Home')

@section ('content')
    <h1>Home</h1>
    <a href="{{ route('home') }}">Home</a>
    <a href="{{ route('about') }}">About</a>
    <a href="{{ route('samples') }}">Samples</a>
@endsection
