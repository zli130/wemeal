@extends('layouts.manage')


@section('content')
    <div class="flex-container">
        <div class="columns">
            <div class="column">
                <h1 class="title">Manage Providers</h1>
            </div>
            <div class="column">
                <a href="{{route('providers.create')}}" class="button is-primary"><i class="fa fa-user-add"></i> Create New Provider</a>
            </div>
        </div>

        <hr>
        <div class="columns">
            <div class="column">
                <div class="card">
                    <div class="card-content">
                        @foreach($providers as $provider)
                            <provider class="media">
                                <figure class="media-left">
                                    <p class="image is-128x128">
                                        <img src="{{asset('images/_providers/' . $provider->image)}}" alt="{{$provider->name}}">
                                    </p>
                                </figure>

                                <div class="media-content">
                                    <div class="content">
                                        <h4>{{$provider->name}}</h4>
                                        <p>
                                            <strong>Owner: {{$provider->woner}}</strong>
                                            {{$provider->description}}
                                        </p>
                                    </div>
                                    <div class="level">
                                        <div class="level-left">
                                            <div class="level-item">
                                                <strong>Created By: {{$provider->user->name}}</strong>
                                            </div>
                                        </div>
                                        <div class="level-right">
                                            <div class="level-item">
                                                <a class="button is-primary" href="{{route('providers.show', $provider->id)}}">View</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </provider>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
