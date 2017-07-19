@extends('layouts.manage')


@section('content')
    <div class="flex-container">
        <div class="columns">
            <div class="column">
                <h1 class="title">Manage Promotions</h1>
            </div>
            <div class="column">
                <a href="{{route('promotions.create')}}" class="button is-primary">Create New Promotion</a>
            </div>
        </div>
        <hr>
        <div class="columns">
            <div class="column is-10">
                <div class="card">
                    <div class="card-content">
                        @if(count($promotions) > 0)
                            <div class="div-table">
                                <div class="columns m-t-5">
                                    <div class="column is-1">&nbsp;</div>
                                    <div class="column is-2">Name</div>
                                    <div class="column is-6">Description</div>
                                    <div class="column is-1">Price</div>
                                    <div class="column is-2">Actions</div>
                                </div>
                                @foreach ($promotions as $promotion)
                                    <div class="columns is-gapless">
                                        <div class="column is-2">
                                            <a href="{{route('promotions.show', $promotion->id)}}">
                                                {{$promotion->name}}
                                            </a>
                                        </div>
                                        <div class="column is-4">
                                            <p>
                                                <small>{{$promotion->start_at->toDateTimeString()}}</small>
                                            </p>
                                        </div>
                                        <div class="column is-2">
                                            <p>
                                                <small>{{$promotion->end_at->toDateTimeString()}}</small>
                                            </p>
                                        </div>
                                        <div class="column is-2">
                                            <p>
                                                <small>{{$promotion->created_at->toDateTimeString()}}</small>
                                            </p>
                                        </div>
                                        <div class="column is-2">
                                            <a class="button is-primary is-outlined" href="{{route('promotions.show', $promotion->id)}}">View</a>
                                            <a class="button is-primary is-outlined" href="{{route('promotions.edit', $promotion->id)}}">Edit</a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <h3>No promotions found!</h3>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
