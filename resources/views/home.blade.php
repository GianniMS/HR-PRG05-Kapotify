@extends('layouts.web')


@section('title', 'Home')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
<h1>Home</h1>
<a href="{{ route('home') }}">Home</a>
<a href="{{ route('about') }}">About</a>
<a href="{{ route('samples.index') }}">Samples</a>
@endsection
