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
                    <div class="card-header">{{ $name }}'s Destinations</div>

                    <div class="card-body">
                        <ul>
                            @foreach($items as $item)
                                <li> user_id: {{ $item->user_id }}, name:
                                    {{$item->name}}
                                    <form
                                            action="/destinations/{{ $item->id}}"
                                            method="post"
                                    >
                                        {{ method_field('delete') }}
                                        {{ csrf_field() }}
                                        <button
                                                class="btn btn-danger"
                                                type="submit"
                                        >
                                            Delete
                                        </button>
                                    </form>
                                </li>

                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
