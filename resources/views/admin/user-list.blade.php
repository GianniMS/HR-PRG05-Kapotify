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
        {{--Display list of all the users, their login count and their role--}}
        <table class="table">
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Login count</th>
                <th>Role</th>
                <th>Action</th>
            </tr>
            @foreach ($users as $user)
                <tbody>
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->login_count }}</td>
                    <td>
                        {{--Dynamic role display--}}
                        @if ($user->role === 1)
                            User
                        @elseif ($user->role === 2)
                            Admin
                        @endif
                    </td>
                    <td>
                        <form method="POST" action="{{ route('change-role', $user) }}">
                            {{--Admin to user / user to admin button--}}
                            @csrf
                            <button class="btn btn-primary" type="submit">
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
