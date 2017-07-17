@extends('layouts.manage')


@section('content')
    <div class="flex-container">
        <div class="columns">
            <div class="column">
                <h1 class="title">Manage Provider</h1>
                <hr>
            </div>
        </div>
        <div class="columns">
            <div class="column is-2">
                <p class="image is-128x128">
                    <img src="{{asset('images/' . $provider->image)}}" alt="{{$provider->name}}">
                </p>
            </div>
            <div class="column is-6">
                <p>
                    <strong>{{$provider->name}}</strong>
                </p>
                <p>
                    <small>{{$provider->description}}</small>
                </p>
                <p>
                    Owner: <strong>{{$provider->owner}}</strong>
                </p>
                <p>
                    Joined On: <strong>{{$provider->created_at->toFormattedDateString()}}</strong>
                </p>

            </div>
            <div class="column">
                <a href="{{route('providers.edit', $provider->id)}}" class="button is-primary">Edit</a>
                <a href="{{route('providers.index')}}" class="button is-primary">Back to provider list</a>
            </div>
        </div>
        <hr>
        <div class="columns">
            <div class="column">
                @if(count($provider->categories) > 0)
                    @foreach ($provider->categories as $category)
                        <div class="card m-t-10">
                            <div class="card-header">
                                <p class="card-header-title">{{$category->name}}</p>
                                <span class="card-header-icon">
                                    <a href="#" class="button is-primary">Edit</a>
                                </span>
                            </div>

                            <div class="card-content">
                                <small>{{$category->description}}</small>
                                <hr>
                                <div class="div-table">
                                    <div class="columns m-t-5">
                                        <div class="column is-1">&nbsp;</div>
                                        <div class="column is-2">Name</div>
                                        <div class="column is-6">Description</div>
                                        <div class="column is-1">Price</div>
                                        <div class="column is-2">Actions</div>
                                    </div>
                                    @foreach ($category->meals as $meal)
                                        <div class="columns is-gapless">
                                            <div class="column is-1">
                                                <a class="image is-64x64" href="{{route('meals.show', $meal->id)}}">
                                                    <img src="{{asset('images/' . $meal->image)}}" alt="{{$provider->name}}">
                                                </a>
                                            </div>
                                            <div class="column is-2">
                                                <a href="{{route('meals.show', $meal->id)}}">
                                                    {{$meal->name}}
                                                </a>
                                            </div>
                                            <div class="column is-6">
                                                <p>
                                                    <small>{{$meal->description}}</small>
                                                </p>
                                            </div>
                                            <div class="column is-1">${{$meal->price}}</div>
                                            <div class="column is-2">
                                                <a class="button is-primary is-outlined" href="{{route('meals.show', $meal->id)}}">View</a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="card">
                        <div class="card-content">
                            <h3>No categories found!</h3>
                            <a href="#" class="button is-primary">Add new category</a>
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </div>
@endsection
