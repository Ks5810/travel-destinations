@extends('layouts.app')

@section('content')
    <div class="container" style="padding-top: 4rem">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $username }}'s Destinations
                    </div>
                    <div class="list-group">
                        @foreach( $destinations as $key => $destination )
                            <div class="list-group-item">
                                <div class="d-flex w-100 justify-content-between">
                                    <p><b>{{ $key+1 }}. {{
                                    $destination->name
                                    }}</b></p>
                                    <form
                                            action="/destinations/{{ $destination->id }}"
                                            method="post"
                                    >
                                        {{ method_field('delete') }}
                                        {{ csrf_field() }}
                                        <button
                                                class="btn btn-sm btn-danger btn-remove"
                                                type="submit"
                                        >
                                            Remove
                                        </button>
                                    </form>
                                </div>
                                {{--                                <div class="px-2 py-1">--}}
                                {{--                                    <p class="d-flex w-50--}}
                                {{--                                justify-content-between flex-row mb-1">--}}
                                {{--                                        <b>latitude:</b> {{ $destination->lat }}--}}
                                {{--                                    </p>--}}
                                {{--                                    <p class="d-flex w-50--}}
                                {{--                                justify-content-between flex-row mb-1">--}}
                                {{--                                        <b>longitude:</b> {{ $destination-> lng }}--}}
                                {{--                                    </p>--}}
                                {{--                                </div>--}}
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
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card justify-content-center">
                    <div class="card-header">
                        Add New Destination by Address
                    </div>
                    <div class="card-body justify-content-center">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action='/destinations'
                              method="POST">
                        {{ method_field('post') }}
                        {{ csrf_field() }}

                            <!-------------------- Name ----------------------->
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

                            <!-------------------- Address -------------------->
                            <div class="form-group row">
                                <label class="col-md-3
                                col-form-label text-md-center"
                                       for="search_input">Address</label>
                                <div class="col-md-8">
                                <input type="text" class="form-control"
                                       id="search_input" placeholder="Type address..."/>
                                </div>
                                <input type="hidden" id="loc_lat" name="lat"/>
                                <input type="hidden" id="loc_lng" name="lng"/>
                            </div>

                            <div class="btn-wrapper d-flex justify-content-center">
                                <button
                                        class="btn btn-add btn-secondary"
                                        type="submit"
                                >
                                    Add Location
                                </button>
                            </div>
                        </form>
                    </div>
                </div>


                <div class="card">
                    <div class="card-header">Add New Destination by
                        Coordinates
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action='/destinations'
                              method="POST"
                        >
                            {{ method_field('post') }}
                            {{ csrf_field() }}
                            <div class="form-group row">
                                <label for="name" class="col-md-3
                                col-form-label text-sm-center">{{ __('Name')
                                }}</label>
                                <div class="col-md-3">
                                    <input id="name" type="text" name="name"
                                           class="form-control"
                                           required>

                                    @error('name')
                                    <span class="invalid-feedback"
                                          role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="lat" class="col-form-label col-md-3">{{
                                __('Latitude')
                                }}</label>
                                <div class="col-md-3">
                                    <input id="lat"
                                           name="lat"
                                           type="text"
                                           class="form-control"
                                           required
                                    >
                                    @error('lat')
                                    <span class="invalid-feedback"
                                          role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <label for="lng" class="col-form-label col-md-3">{{ __
                                ('Longitude')
                                }}</label>

                                <div class="col-md-3">
                                    <input
                                            id="lng" type="text" name="lng"
                                            class="form-control" required>

                                    @error('lng')
                                    <span class="invalid-feedback"
                                          role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="d-flex justify-content-center">
                                <button
                                        class="btn btn-add btn-secondary"
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
@endsection

@section('scripts')
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script>


        // Prevent sending form by enter key
        var searchInput = 'search_input';
        $('#search_input').keydown(function (e) {
            if (e.which == 13 && $('.pac-container:visible').length) return false;
        });

        // Get auto-completion
        $(document).ready(function()
        {
            var autocomplete;
            autocomplete = new google.maps.places.Autocomplete(
                document.getElementById(searchInput), {
                    types: [ 'geocode' ],
            });

            google.maps.event.addListener(autocomplete, 'place_changed',
                function()
                {
                    var near_place = autocomplete.getPlace();
                    document.getElementById('loc_lat').value =
                        near_place.geometry.location.lat();
                    document.getElementById('loc_lng').value =
                        near_place.geometry.location.lng();

                    document.getElementById('lat_view').innerHTML =
                        near_place.geometry.location.lat();
                    document.getElementById('lng_view').innerHTML =
                        near_place.geometry.location.lng();
                });
        });
        $(document).on('change', '#' + searchInput, function()
        {
            document.getElementById('lat').value = '';
            document.getElementById('lng').value = '';

            document.getElementById('lat_view').innerHTML = '';
            document.getElementById('lng_view').innerHTML = '';
        });
    </script>
    <script src="{{ asset('js/app.js') }}"></script>

@endsection
