@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="text-align: center">
                    <div class="card-header font-weight-bolder">Hi
                        guest!
                    </div>

                    <div class="card-body" style="display: flex; justify-content: center">
                        <h5 style="width: 80%">
                            <a class="page-link"
                               style="margin: 1rem"
                               href="/login">Login</a>
                            or
                            <a
                                    class="page-link"
                                    style="margin: 1rem"
                                    href="/register">Sign up</a></h5>
                    </div>
                </div>
            </div>
@endsection