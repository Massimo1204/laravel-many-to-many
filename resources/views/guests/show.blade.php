@extends('layouts.app')

@section('content')
    <div class="my-post-container d-flex align-items-center flex-column">
        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        <div class="w-50 d-flex align-items-center flex-column pt-4 pb-2 border-bottom border-secondary">
            <h2 class="mb-3">{{ ucfirst($post->user->name) }}</h2>
            <img class="mb-3" src="{{ $post->image_source }}" alt="post image">
            <div class="my-content-wrapper clearfix">
                <h3>{{ ucfirst($post->title) }}</h3>
                <p>{{ ucfirst($post->content) }}</p>
                <ul class="float-right">
                    @foreach ($post->categories as $category)
                        <li class="d-inline ml-3 " style="color:{{$category->color}}">{{ $category->name }}</li>                            
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection