@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Show {{$category->name}}</div>

                    <div class="card-body">
                        <p> {{ $category->name }}</p>
                        <br>
                        <p> {{ $category->description }}</p>

                        <div class="btn-group btn-group-sm" role="group" aria-label="...">
                            <a href="{{route('categories.edit', ['id' => $category->id])}}" class="btn btn-dark">Edit</a>
                            <a class="btn btn-danger"
                                onclick="event.preventDefault();document.getElementById('delete-form').submit();">Delete</a>


                            <form id="delete-form" action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display: none;">
                                @csrf
                                {{ method_field('DELETE') }}
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
