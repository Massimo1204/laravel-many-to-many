@extends('layouts.app')

@section('content')
    @if (count($posts) != 0)
        <div class="my-post-container d-flex align-items-center flex-column">
            <div class="w-50 mx-auto text-center">
                <h1 style= "color : {{$category->color}}">{{$category->name}}</h1>
                <a class="float-right" href="{{route('admin.categories.edit', $category)}}">
                    <button class="btn btn-warning fw-bold btn-lg mr-3">
                        Edit Categories
                    </button>
                </a>
            </div>

            @foreach ($posts as $post)
                <div class="w-50 d-flex align-items-center flex-column pt-5 pb-2 border-bottom border-secondary">
                    <h2 class="mb-3">{{ $post->user->name }}</h2>
                    <a href="{{ route('admin.posts.show', $post) }}">
                        <img class="mb-4" src="{{ $post->image_source }}" alt="post image">
                    </a>
                    <div class="my-content-wrapper clearfix">
                        <h3>{{ $post->title }}</h3>
                        <p>{{ $post->content }}</p>
                        <ul class="float-right">
                            @foreach ($post->categories as $category)
                                <li class="d-inline ml-3" style="color:{{$category->color}}">{{ $category->name }}</li>                            
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endforeach
        </div>
        @else
        <div class="w-50 mx-auto text-center clearfix">
            <h1 style= "color : {{$category->color}}">{{$category->name}}</h1>
            <a class="float-right" href="{{route('admin.categories.edit', $category)}}">
                <button class="btn btn-warning fw-bold btn-lg mr-3">
                    Edit Categories
                </button>
            </a>
        </div>
        <h2 class="text-secondary text-center mt-5">This Category has no Posts</h2>
    @endif
@endsection