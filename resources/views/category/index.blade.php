@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">All categories
                    <div class="float-right">
                        <a href="{{route('categories.create')}}" class="btn btn-primary">  Add New Category</a>
                    </div>
                    </div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <table class="table table-hover">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col" width="20%">Name</th>
                                <th scope="col" width="60%">Description</th>
                                <th scope="col" width="20%">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $category)
                                    <tr>
                                    <th scope="row">{{$category['id']}}</th>
                                    <td>{{$category['name']}}</td>
                                    <td>{{$category['description'] ?: ''}}</td>
                                    <td>
                                        <div class="btn-group btn-group-sm" role="group" aria-label="...">
                                            <a href="{{route('categories.show', $category['id'])}}" class="btn btn-info">Show</a>
                                            <a href="{{route('categories.edit', $category['id'])}}" class="btn btn-dark">Edit</a>
                                            <button
                                                type="button"
                                                class="btn btn-danger"
                                                onclick="event.preventDefault();deleteCategory('{{route('categories.destroy', $category['id'])}}')">Delete</button>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <form id="delete-form" method="POST" style="display: none;">
            @csrf
            {{ method_field('DELETE') }}
        </form>
        <script>
            function deleteCategory(url) {
                const form = document.getElementById('delete-form');
                form.action = url;
                form.submit();
            }
        </script>
    </div>

@endsection
