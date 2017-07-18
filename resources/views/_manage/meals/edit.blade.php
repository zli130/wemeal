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
            <div class="column is-two-third">
                <h1 class="title">Edit Meal</h1>
            </div>
            <div class="column">
                <a href="{{route('providers.index')}}" class="button is-primary">Back to Provider List</a>
            </div>
        </div>
        <hr>
        <div class="columns">
            <div class="column is-two-third">
                <div class="card">
                    <div class="card-content">
                        <form action="{{route('meals.update', $meal->id)}}"  method="post" enctype="multipart/form-data">
                            {{method_field('PUT')}}
                            {{csrf_field()}}
                            <div class="field">
                                <label for="name" class="label">Name</label>
                                <p class="control">
                                    <input class="input{{$errors->has('name') ? ' is-danger' : ''}}" type="text" name="name" value="{{old('name') ?? $meal->name}}" autocomplete="off" required>
                                </p>
                                @if($errors->has('name'))
                                    <p class="help is-danger">{{$errors->first('name')}}</p>
                                @endif
                            </div>
                            <div class="field">
                                <label for="description" class="label">Description</label>
                                <p class="control">
                                    <textarea rows="3" name="description" class="textarea{{$errors->has('description') ? ' is-danger' : ''}}">{{old('description') ?? $meal->description}}</textarea>
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
                                                    <input class="input{{$errors->has('price') ? ' is-danger' : ''}}" type="text" name="price" value="{{old('price') ?? $meal->price}}" autocomplete="off" required>
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
                                    <b-checkbox name="active" class="m-t-10" {{$meal->active == 1 ? 'checked' : ''}}>Active</b-checkbox>
                                </p>
                            </div>

                            <button type="submit" class="button is-primary is-outlined m-t-10">Save Meal</button>
                        </form>
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
                image: '{{$meal->image}}'
            }
        });
    </script>
@endsection
