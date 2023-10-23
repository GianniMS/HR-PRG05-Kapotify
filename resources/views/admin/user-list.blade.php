@extends('layouts.web')


@section('title', 'User list')

@section('content')
    <div class="container">
        <h1>User list</h1>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <table class="table">
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Role</th>
            </tr>
            @foreach ($users as $user)
                <tbody>
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>
                        @if ($user->role === 1)
                            User
                        @elseif ($user->role === 2)
                            Admin
                        @endif
                    </td>
                    <td>
                        <form method="POST" action="{{ route('change-role', $user) }}">
                            @csrf
                            <button type="submit">
                                @if ($user->role === 1)
                                    Make Admin
                                @elseif ($user->role === 2)
                                    Make User
                                @endif
                            </button>
                        </form>
                    </td>
                </tr>
                </tbody>
            @endforeach
        </table>
    </div>
@endsection
