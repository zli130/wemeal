@extends('layouts.manage')


@section('content')
    <div class="flex-container">
        <nav class="breadcrumb">
            <ul>
                <li><a href="{{route('providers.show', $category->provider->id)}}">{{$category->provider->name}}</a></li>
                <li class="is-active"><a>{{$category->name}}</a></li>
            </ul>
        </nav>
        <div class="columns">
            <div class="column">
                <h1 class="title">Manage Category</h1>
                <hr>
            </div>
        </div>
        <div class="columns">
            <div class="column is-8">
                <p>
                    <strong>{{$category->name}}</strong>
                </p>
                <p>
                    <small>{{$category->description}}</small>
                </p>
                <p>
                    Joined On: <strong>{{$category->created_at->toFormattedDateString()}}</strong>
                </p>

            </div>
            <div class="column">
                <a href="{{route('categories.edit', $category->id)}}" class="button is-primary">Edit</a>
                <a href="{{route('providers.show', $category->provider->id)}}" class="button is-primary">Back to provider</a>
            </div>
        </div>
        <hr>
        <div class="columns">
            <div class="column i-8">
                <div class="card">
                    <div class="card-content">
                        <p><strong>Meals</strong></p>
                        <hr>
                        @if(count($category->meals) > 0)
                            <div class="div-table">
                                <div class="columns m-t-5">
                                    <div class="column is-1">&nbsp;</div>
                                    <div class="column is-2">Name</div>
                                    <div class="column is-6">Description</div>
                                    <div class="column is-1">Price</div>
                                    <div class="column is-2">Actions</div>
                                </div>
                                @foreach ($category->meals as $meal)
                                    <div class="columns is-gapless columns m-t-10">
                                        <div class="column is-1">
                                            <a class="image is-64x64" href="{{route('meals.show', $meal->id)}}">
                                                <img src="{{asset('images/' . $meal->image)}}" alt="{{$meal->name}}">
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
                                            <a class="button is-primary is-outlined" href="{{route('meals.edit', $meal->id)}}">Edit</a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <h3>No meals found!</h3>
                            <a href="#" class="button is-primary">Add new meal</a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="column is-4">
                <div class="card">
                    <div class="card-content">
                        <p><strong>Add new meal</strong></p>
                        <hr>
                        <form action="{{route('meals.store')}}"  method="post" enctype="multipart/form-data">
                            {{-- {{method_field('PUT')}} --}}
                            {{csrf_field()}}
                            <div class="field">
                                <label for="name" class="label">Name</label>
                                <p class="control">
                                    <input class="input{{$errors->has('name') ? ' is-danger' : ''}}" type="text" name="name" value="{{old('name')}}" autocomplete="off" required>
                                </p>
                                @if($errors->has('name'))
                                    <p class="help is-danger">{{$errors->first('name')}}</p>
                                @endif
                            </div>
                            <div class="field">
                                <label for="description" class="label">Description</label>
                                <p class="control">
                                    <textarea rows="3" name="description" class="textarea{{$errors->has('description') ? ' is-danger' : ''}}">{{old('description')}}</textarea>
                                </p>
                                @if($errors->has('description'))
                                    <p class="help is-danger">{{$errors->first('description')}}</p>
                                @endif
                            </div>
                            <div class="field">
                                <label for="price" class="label">Price (<small>GST inc.</small>)</label>
                                <div class="columns">
                                    <div class="column is-4">
                                        <p class="control">
                                            <div class="level">
                                                <div class="level-left p-r-10">
                                                    <i class="fa fa-usd"></i>
                                                </div>
                                                <div class="level-right">
                                                    <input class="input{{$errors->has('price') ? ' is-danger' : ''}}" type="text" name="price" value="{{old('price')}}" autocomplete="off" required>
                                                </div>
                                            </div>
                                        </p>
                                    </div>
                                </div>

                                @if($errors->has('price'))
                                    <p class="help is-danger">{{$errors->first('price')}}</p>
                                @endif
                            </div>
                            <div class="field">
                                <label for="image" class="label">Image</label>
                                <p class="control">
                                    <image-upload v-model="image"></image-upload>
                                </p>
                                @if($errors->has('image'))
                                    <p class="help is-danger">{{$errors->first('image')}}</p>
                                @endif
                            </div>
                            <div class="field">
                                <p class="control">
                                    <b-checkbox name="active" class="m-t-10" checked>Active</b-checkbox>
                                </p>
                            </div>
                            <input type="hidden" name="category" value="{{$category->id}}">

                            <input type="hidden" name="provider" value="{{$category->provider->id}}">

                            <button type="submit" class="button is-primary is-outlined m-t-10">Add New Meal</button>
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
                image: null
            }
        });
    </script>
@endsection
