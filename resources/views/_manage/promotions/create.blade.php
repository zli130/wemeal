@extends('layouts.manage')


@section('content')
    <div class="flex-container">
        <div class="columns">
            <div class="column is-two-third">
                <h1 class="title">Create New Promotion</h1>
            </div>
            <div class="column">
                <a href="{{route('promotions.index')}}" class="button is-primary">Back to Promotions</a>
            </div>
        </div>

        <hr>
        <div class="columns">
            <div class="column is-8 is-offset-2">
                <div class="card">
                    <div class="card-content">
                        <form role="form" action="{{route('promotions.store')}}" method="POST">
                            {{-- {{method_field('PUT')}} --}}
                            {{csrf_field()}}

                            <b-field label="Name">
                                <b-input type="text"
                                    value="{{old('name')}}"
                                    name="name"
                                    maxlength="50">
                                </b-input>
                                @if($errors->has('name'))
                                    <p class="help is-danger">{{$errors->first('name')}}</p>
                                @endif
                            </b-field>
                            <b-field label="Description">
                                <b-input maxlength="400" type="textarea" name="description">{{old('description')}}</b-input>
                                @if($errors->has('description'))
                                    <p class="help is-danger">{{$errors->first('description')}}</p>
                                @endif
                            </b-field>
                            <b-field label="Provider">
                                <b-select placeholder="Select a provider" required name="provider">
                                    @foreach ($providers as $provider)
                                        <option value="{{$provider->id}}">{{$provider->name}}</option>
                                    @endforeach
                                </b-select>
                            </b-field>
                            {{-- <vue-datetime-picker></vue-datetime-picker> --}}
                            <button type="submit" class="button is-primary is-outlined m-t-10">Create Promotion</button>
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
            name: ''
        }
    });
</script>
@endsection
