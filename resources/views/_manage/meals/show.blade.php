@extends('layouts.manage')


@section('content')
    <div class="flex-container">
        <nav class="breadcrumb">
            <ul>
                <li><a href="{{route('providers.show', $meal->provider->id)}}">{{$meal->provider->name}}</a></li>
                <li><a href="{{route('categories.show', $meal->category->id)}}">{{$meal->category->name}}</a></li>
                <li class="is-active"><a>{{$meal->name}}</a></li>
            </ul>
        </nav>
        <div class="columns">
            <div class="column is-8">
                <div class="card">
                    <div class="card-content">
                        <div class="columns">
                            <div class="column is-one-third">
                                <figure class="image">
                                    <img src="{{asset('images/' . $meal->image)}}" alt="{{$meal->name}}">
                                </figure>
                            </div>
                            <div class="column">
                                <div class="content">
                                    <p>{{$meal->description}}</p>
                                    <hr>
                                    <div class="columns">
                                        <div class="column is-one-third">
                                            <small>{{$meal->created_at->toFormattedDateString()}}</small>
                                        </div>
                                        <div class="column is-one-third">
                                            $ {{$meal->price}} <small>(GST inc.)</small>
                                        </div>
                                        <div class="column is-one-third">
                                            <a href="{{route('meals.edit', $meal->id)}}" class="button is-primary">Edit</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="card">
                    <div class="card-content">
                        <a href="{{route('providers.show', $meal->provider->id)}}" class="button is-primary">Back to provider</a>
                        <hr>
                        <a href="{{route('categories.show', $meal->category->id)}}" class="button is-primary">Back to Catehory</a>
                        <hr>
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
                image: null
            }
        });
    </script>
@endsection
