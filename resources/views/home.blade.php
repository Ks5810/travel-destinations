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
@endsection