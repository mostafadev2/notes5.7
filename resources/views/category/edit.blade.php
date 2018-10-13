@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="card-header">Edit Category</div>

                    <div class="card-body">
                        @include('category.form', $category)
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
