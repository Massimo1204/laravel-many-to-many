@extends('layouts.app')

@section('content')
    <div class="alerts-container mx-3">
        @if (session('edited-message'))
            <div class="alert alert-success">
                {{session('edited-message')}}
            </div>
        @endif
        @if (session('created-message'))
            <div class="alert alert-success">
                {{session('created-message')}}
            </div>
        @endif
        @if (session('deleted-message'))
        <div class="alert alert-success">
            {{session('deleted-message')}}
        </div>
    @endif
    </div>
    <div class="container-fluid w-50">
        <div class="row">
            <div class="col-12 mb-5">
                <h1 class="text-center">Select Category</h1>
            </div>

            @foreach ($categories as $category)
                <div class="col-2 mb-4">
                    <a style='color : {{$category->color}}' href="{{route('admin.categories.show', $category)}}">
                        <h3>
                            {{$category->name}}
                        </h3>
                    </a>
                </div>
            @endforeach
            <div class="col-12 clearfix">
                <a class="float-right" href="{{route('admin.categories.create')}}">
                    <button class="btn btn-success fw-bold btn-lg mr-3">
                        Add Category
                    </button>
                </a>
            </div>
        </div>
    </div>
@endsection