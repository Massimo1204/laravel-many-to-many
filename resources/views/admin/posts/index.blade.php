@extends('layouts.app')

@section('content')
    <div class="my-post-container d-flex align-items-center flex-column">
        @foreach ($posts as $post)
            <div class="w-50 d-flex align-items-center flex-column pt-5 pb-2 border-bottom border-secondary">
                <h2 class="mb-3">{{ $post->user->name }}</h2>
                <a href="{{ route('admin.posts.show', $post) }}">
                    <img class="mb-4" src="{{ $post->image_source }}" alt="post image">
                </a>
                <div class="my-content-wrapper">
                    <h3>{{ $post->title }}</h3>
                    <p>{{ $post->content }}</p>
                </div>
            </div>
        @endforeach
        <div class="mt-4">
            {{ $posts->links() }}
        </div>
    </div>
@endsection