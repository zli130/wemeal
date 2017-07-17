@extends('layouts.manage')


@section('content')
    <div class="flex-container">
        <div class="columns">
            <div class="column is-two-third">
                <h1 class="title">Edit User</h1>
            </div>
            <div class="column">
                <a href="{{route('users.index')}}" class="button is-primary">Back to User List</a>
            </div>
        </div>

        <hr>
        <div class="columns">
            <div class="column is-one-third">
                <div class="card">
                    <div class="card-content">
                        <h3>Account Details</h3>
                        <hr>
                        <form role="form" action="{{route('users.update', $user->id)}}" method="post">
                            {{method_field('PUT')}}
                            {{csrf_field()}}

                            <div class="field">
                                <label for="name" class="label">Name</label>
                                <p class="control">
                                    <input class="input{{$errors->has('name') ? ' is-danger' : ''}}" type="text" name="name" id="name" value="{{old('name') ? old('name') : $user->name}}" autocomplete="off" required>
                                </p>
                                @if($errors->has('name'))
                                    <p class="help is-danger">{{$errors->first('name')}}</p>
                                @endif
                            </div>
                            <div class="field">
                                <label for="email" class="label">Email Address</label>
                                <p class="control">
                                    <input class="input{{$errors->has('email') ? ' is-danger' : ''}}" type="text" name="email" id="email" value="{{old('email') ? old('email') : $user->email}}" autocomplete="off" required>
                                </p>
                                @if($errors->has('email'))
                                    <p class="help is-danger">{{$errors->first('email')}}</p>
                                @endif
                            </div>

                            <div class="field">
                                <label for="password" class="label">Password</label>
                                <b-radio-group v-model="password_options" name="password_options">
                                    <div class="field">
                                        <b-radio value="keep">Do Not Change Password</b-radio>
                                    </div>

                                    <div class="field">
                                        <b-radio value="auto">Auto-Generate New Password</b-radio>
                                    </div>

                                    <div class="field">
                                        <b-radio value="manual">Manually Set New Password</b-radio>
                                        <p class="control">
                                            <input class="input" type="password" name="password" v-if="password_options == 'manual'">
                                        </p>
                                    </div>
                                </b-radio-group>
                            </div>

                            <div class="field">
                                <p class="control">
                                    <b-checkbox name="active" class="m-t-10" {{$user->active == 1 ? 'checked' : ''}}>Active</b-checkbox>
                                </p>
                            </div>

                            <button type="submit" class="button is-primary is-outlined m-t-10">Update User Account</button>
                        </form>
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

@section('scripts')
    <script>
        var app = new Vue({
            el: '#app',
            data: {
                password_options: 'keep'
            }
        });
    </script>
@endsection
