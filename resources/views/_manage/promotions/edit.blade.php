@extends('layouts.manage')


@section('content')
    <div class="flex-container">
        <div class="columns">
            <div class="column is-two-third">
                <h1 class="title">Edit Provider</h1>
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
                        <h3>Provider Details</h3>
                        <hr>
                        <form role="form" action="{{route('providers.update', $provider->id)}}" method="post" enctype="multipart/form-data">
                            {{method_field('PUT')}}
                            {{csrf_field()}}

                            <div class="field">
                                <label for="name" class="label">Name</label>
                                <p class="control">
                                    <input class="input{{$errors->has('name') ? ' is-danger' : ''}}" type="text" name="name" id="name" value="{{old('name') ? old('name') : $provider->name}}" autocomplete="off" required>
                                </p>
                                @if($errors->has('name'))
                                    <p class="help is-danger">{{$errors->first('name')}}</p>
                                @endif
                            </div>
                            <div class="field">
                                <label for="description" class="label">Description</label>
                                <p class="control">
                                    <textarea rows="3" name="description" class="textarea{{$errors->has('description') ? ' is-danger' : ''}}">{{old('description') ? old('description') : $provider->description}}</textarea>
                                </p>
                                @if($errors->has('description'))
                                    <p class="help is-danger">{{$errors->first('description')}}</p>
                                @endif
                            </div>

                            <div class="field">
                                <label for="image" class="label">Image</label>
                                <p class="control">
                                    {{-- <input class="" type="file" name="image"> --}}
                                    <image-upload v-model="image"></image-upload>
                                </p>
                                @if($errors->has('image'))
                                    <p class="help is-danger">{{$errors->first('image')}}</p>
                                @endif
                            </div>

                            <div class="field">
                                <label for="address" class="label">Address</label>
                                <p class="control">
                                    <input class="input{{$errors->has('address') ? ' is-danger' : ''}}" type="text" name="address" value="{{old('address') ? old('address') : $provider->address}}" autocomplete="off" required>
                                </p>
                                @if($errors->has('address'))
                                    <p class="help is-danger">{{$errors->first('address')}}</p>
                                @endif
                            </div>

                            <div class="field">
                                <label for="phone" class="label">Phone</label>
                                <p class="control">
                                    <input class="input{{$errors->has('phone') ? ' is-danger' : ''}}" type="text" name="phone" value="{{old('phone') ? old('phone') : $provider->phone}}" autocomplete="off" required>
                                </p>
                                @if($errors->has('phone'))
                                    <p class="help is-danger">{{$errors->first('phone')}}</p>
                                @endif
                            </div>

                            <div class="field">
                                <label for="owner" class="label">Owner</label>
                                <p class="control">
                                    <input class="input{{$errors->has('owner') ? ' is-danger' : ''}}" type="text" name="owner" value="{{old('owner') ? old('owner') : $provider->owner}}" autocomplete="off" required>
                                </p>
                                @if($errors->has('owner'))
                                    <p class="help is-danger">{{$errors->first('owner')}}</p>
                                @endif
                            </div>

                            <div class="field">
                                <p class="control">
                                    <b-checkbox name="active" class="m-t-10" {{$provider->active == 1 ? 'checked' : ''}}>Active</b-checkbox>
                                </p>
                            </div>

                            <button type="submit" class="button is-primary is-outlined m-t-10">Update Provider</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="column is-one-third">
                <div class="card">
                    <div class="card-content">
                        <h3>Categories</h3>
                        <hr>
                        @if (count($provider->categories) > 0)
                            <aside class="menu">
                                <ul class="menu-list">
                                    @foreach ($provider->categories as $category)
                                        <li>
                                            <a href="{{route('categories.show', $category->id)}}">{{$category->name}}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </aside>
                        @endif
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
                image: '{{$provider->image}}'
            }
        });
    </script>
@endsection
