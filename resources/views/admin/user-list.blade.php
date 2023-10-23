@extends('layouts.web')


@section('title', 'User list')

@section('content')
    <div class="container">
        <h1>User list</h1>
        @foreach ($users as $user)
            <table class="table">
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Role</th>
                </tr>
                <tbody>
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->role }}</td>
                </tr>
                </tbody>
            </table>
        @endforeach
    </div>
@endsection
