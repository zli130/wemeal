@extends('layouts.manage')


@section('content')
    <div class="flex-container">
        <div class="columns">
            <div class="column is-two-third">
                <h1 class="title">View User</h1>
            </div>
            <div class="column">
                <a href="{{route('users.index')}}" class="button is-primary">Back to User List</a>
                <a class="button is-outlined is-primary" href="{{route('users.edit', $user->id)}}">Edit</a>
            </div>
        </div>

        <hr>
        <div class="columns">
            <div class="column is-one-third">
                <div class="card">
                    <div class="card-content">
                        <h3>Account Details</h3>
                        <hr>
                        Name: {{$user->name}}
                        <hr>
                        Email: {{$user->email}}
                        <hr>
                        Active: {{$user->active == 1 ? 'YES' : 'NO'}}
                    </div>
                </div>
            </div>
            <div class="column is-two-third">
                <div class="card">
                    <div class="card-content">
                        <h3>User Profile</h3>
                        <hr>
                        profile
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
