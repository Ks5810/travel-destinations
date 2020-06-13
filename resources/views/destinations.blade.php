@extends('layouts.app')

@section('content')
    <div class="container" style="padding-top: 4rem">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add New Destination</div>
                    <div class="card-body ">
                        <form action='/destinations'
                              method="POST"
                        >
                            {{ method_field('post') }}
                            {{ csrf_field() }}
                            <div class="form-group row">
                                <label for="name" class="col-md-3
                                col-form-label text-md-center">{{ __('Name')
                                }}</label>
                                <div class="col-md-5">
                                    <input id="name" type="text" name="name"
                                           class="form-control"
                                           required>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="lat" class="col-md-3
                                col-form-label text-md-center">{{ __('Latitude')
                                }}</label>
                                <div class="col-md-5">
                                    <input id="lat"
                                           name="lat"
                                           type="text"
                                           class="form-control"
                                           required
                                    >
                                    @error('lat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="lng" class="col-md-3
                                col-form-label text-md-center">{{ __
                                ('Longitude')
                                }}</label>

                                <div class="col-md-5">
                                    <input
                                            id="lng" type="text" name="lng"
                                            class="form-control" required>

                                    @error('lng')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row" style="padding-left:
                            10rem">
                                <button
                                        class="btn btn-info col-lg-5"
                                        type="submit"
                                >
                                    Add Location
                                </button>
                            </div>
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
                        @foreach( $destinations as $key => $destination )
                            <div class="list-group-item">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1">{{ $key+1 }}
                                        . {{ $destination->name }}</h5>
                                    <form
                                            action="/destinations/{{ $destination->id }}"
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
                                        <b>latitude:</b> {{ $destination->lat }}
                                    </p>
                                    <p class="d-flex w-50
                                justify-content-between flex-row mb-1">
                                        <b>longitude:</b> {{ $destination-> lng }}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="container">
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
    </div>
@endsection
