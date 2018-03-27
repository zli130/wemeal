@extends('layouts.manage')


@section('content')
    <div class="flex-container">
        <div class="columns">
            <div class="column">
                <h1 class="title">Manage User</h1>
            </div>
            <div class="column">
                <a href="{{route('users.create')}}" class="button is-primary"><i class="fa fa-user-add"></i> Create New User</a>
            </div>
        </div>

        <hr>
        <div class="card">
            <div class="card-content">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Date Created</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>
                                    <a href="{{route('users.show', $user->id)}}" class="{{ $user->active != 1 ? 'is-inactive' : '' }}">
                                        {{$user->name}}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{route('users.show', $user->id)}}" class="{{ $user->active != 1 ? 'is-inactive' : '' }}">
                                        {{$user->email}}
                                    </a>
                                </td>
                                <td>{{$user->created_at->toFormattedDateString()}}</td>
                                <td>
                                    <a class="button is-outlined is-primary" href="{{route('users.show', $user->id)}}">View</a>
                                    <a class="button is-outlined is-primary" href="{{route('users.edit', $user->id)}}">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{$users->links()}}
            </div>
        </div>
    </div>
@endsection
