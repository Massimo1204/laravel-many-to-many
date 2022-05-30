@extends('layouts.app')

@section('content')
    <div class="my-post-container d-flex align-items-center flex-column">
        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        @if (session('edited-message'))
        <div class="alert alert-success">
            {{ session('edited-message') }}
        </div>
    @endif
        <div class="w-50 d-flex align-items-center flex-column pt-4 pb-2">
            <h2 class="mb-3">{{ ucfirst($post->user->name) }}</h2>
            <img class="mb-3" src="{{ $post->image_source }}" alt="post image">
            <div class="my-content-wrapper">
                <h3>{{ ucfirst($post->title) }}</h3>
                <p>{{ ucfirst($post->content) }}</p>
                <ul class="mb-3 p-0">
                    @foreach ($post->categories as $category)
                        <li class="d-inline mr-3" style="color:{{$category->color}}">{{ $category->name }}</li>                            
                    @endforeach
                </ul>
            </div>
            <div class="my-btn-wrapper align-self-end d-flex">
                <a href="{{route('admin.categories.create')}}">
                    <button class="btn btn-success fw-bold mr-3">
                        Add Category
                    </button>
                </a>
                <a href="{{route('admin.posts.edit', $post)}}">
                    <button class="btn btn-warning fw-bold mr-3">Edit Post</button>
                </a>
                <form action="{{route('admin.posts.destroy', $post)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger fw-bold">Delete</button>
                </form>
            </div>
        </div>
    </div>
@endsection