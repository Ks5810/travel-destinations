@extends('layouts.app')

@section('content')

    <div class="container card-container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Hello, guest! </div>
                    <div class="auth-card">
                    <div class="card-body">
                        <div class="d-flex flex-column">
                        <a class="btn my-2 btn-home btn-secondary"
                           href="/login">Login</a>
                        or
                        <a class="btn my-2 btn-home btn-secondary"
                           href="/register">Sign up</a>
                        </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">{{$username}}</div>
                            <div class="list-group">

                                <!-- List locations -->
                                @foreach( $destinations as $key => $destination )
                                    <div class="list-group-item">
                                        <div class="d-flex w-100 justify-content-between">
                                            <p><b>{{ $key+1 }}. {{ $destination->name }}</b></p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <!-- Load map component from js/components/Map.js -->
                            <div id="map" class="map"
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