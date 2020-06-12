@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add New Destination</div>
                    <div class="card-body">
                        <form
                                action="/destinations/create"
                                method="post"
                        >
                            {{ method_field('get') }}
                            {{ csrf_field() }}
                            <label>
                                <input type="text" name="name"/>
                            </label>
                            <button
                                    class="btn btn-info"
                                    type="submit"
                            >
                                Add Location
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $username }}'s Destinations
                    </div>
                    <div class="list-group">
                        @foreach($destinations as $key => $destination)
                            <div class="list-group-item">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1">{{ $key+1 }}.  {{
                                    $destination->name
                                    }}</h5>
                                    <form
                                            action="/destinations/{{
                                            $destination->id }}"
                                            method="post"
                                    >
                                        {{ method_field('delete') }}
                                        {{ csrf_field() }}
                                        <button
                                                class="btn btn-sm btn-danger"
                                                type="submit"
                                        >
                                            Remove
                                        </button>
                                    </form>
                                </div>
                                <div class="px-3 py-1">
                                    <p class="d-flex w-50
                                justify-content-between flex-row mb-1">
                                        <b>latitude:</b> {{ $destination->lat
                                        }}</p>
                                    <p class="d-flex w-50
                                justify-content-between flex-row mb-1">
                                        <b>longitude:</b> {{ $destination-> lng }}
                                    </p>
                                </div>

                            </div>
                        @endforeach
                    </div>
                    <div id="map"
                         center_lat='{{ $center_lat }}'
                         center_lng='{{ $center_lng }}'
                         destinations='{{ $destinations }}'>
                        <script src="../js/app.js"></script>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
