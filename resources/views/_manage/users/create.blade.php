@extends('layouts.manage')


@section('content')
    <div class="flex-container">
        <div class="columns">
            <div class="column is-two-third">
                <h1 class="title">Create User</h1>
            </div>
            <div class="column">
                <a href="{{route('users.index')}}" class="button is-primary">Back to User List</a>
            </div>
        </div>

        <hr>
        <div class="columns">
            <div class="column is-one-third is-offset-one-third">
                <div class="card">
                    <div class="card-content">
                        <form role="form" action="{{route('users.store')}}" method="post">
                            {{csrf_field()}}
                            <div class="field">
                                <label for="name" class="label">Name</label>
                                <p class="control">
                                    <input class="input{{$errors->has('name') ? ' is-danger' : ''}}" type="text" name="name" id="name" value="{{old('name')}}" autocomplete="off" required>
                                </p>
                                @if($errors->has('name'))
                                    <p class="help is-danger">{{$errors->first('name')}}</p>
                                @endif
                            </div>
                            <div class="field">
                                <label for="email" class="label">Email Address</label>
                                <p class="control">
                                    <input class="input{{$errors->has('email') ? ' is-danger' : ''}}" type="text" name="email" id="email" value="{{old('email')}}" autocomplete="off" required>
                                </p>
                                @if($errors->has('email'))
                                    <p class="help is-danger">{{$errors->first('email')}}</p>
                                @endif
                            </div>

                            <div class="field">
                                <label for="password" class="label">Password</label>
                                <p class="control">
                                    <input class="input" type="password" name="password" v-if="!auto_password">
                                    <b-checkbox name="auto_generate" class="m-t-10" v-model="auto_password" checked>Auto Generate Password</b-checkbox>
                                </p>
                            </div>

                            <div class="field">
                                <p class="control">
                                    <b-checkbox name="active" class="m-t-10" checked>Active</b-checkbox>
                                </p>
                            </div>

                            <button type="submit" class="button is-primary is-outlined m-t-10">Create User</button>
                        </form>
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
                auto_password: true
            }
        });
    </script>
@endsection
