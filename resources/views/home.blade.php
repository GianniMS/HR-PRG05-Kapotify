@extends('layouts.web')

{{--Dynamic title--}}
@section('title', 'Home')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>Welcome to Kapotify</h1>
            </div>
            {{--            Informative text--}}
            <div class="card-body">
                <p>
                    Welcome to Kapotify, a site where you can post your favorite music project.
                    You can add the name, add a description, specify if the music project is an album or single
                    and you can upload a cover!
                    All aspects of a project can be edited by the user that posted said project, even the cover.
                    A user can't edit the projects posted by other users.
                </p>
                <p>
                    Posting a music project is only possible after 3 or more logins.
                    Some parts of the site (the project manager and the user list) are only accessible for users with
                    the
                    'Admin' role.
                    Admins have the option to toggle your post from 'active' to 'inactive'. Active means that your post
                    is visible for other users. And, as expected, inactive means your post isn't visible for other
                    users.
                    Admins can delete posts that they deem inappropriate or unfit for Kapotify. They are unable
                    to edit other users their post.
                    Admins also have the ability to keep track of each users login count. They can also give the role
                    of admin to other users.
                </p>
            </div>
        </div>
    </div>
@endsection
