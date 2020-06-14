@extends('layouts.app')

@section('content')
    <div class="container" style="padding-top: 4rem">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Hello, guest!
                    </div>

                    <div class="card-body d-flex flex-column
                    justify-content-center text-center">
                        <a class=" my-lg-4 btn btn-home btn-secondary"
                           href="/login">Login</a>
                        or
                        <a class="my-lg-4 btn btn-home btn-secondary"
                           href="/register">Sign up</a>
                    </div>
                </div>
            </div>
@endsection