@extends('layouts.app')

@section('content')
<h1 class="text-center my-5">Create a new Post</h1>
<form class="w-50 m-auto clearfix" action="{{ route('admin.posts.update', $post) }}" method='post'>
    @csrf
    @method('PUT')

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger">
                {{ $error }}
            </div>
        @endforeach
    @endif

    <div class="form-group row mb-4">
        <label for="image_source" class="col-sm-2 col-form-label">Image url</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="image_source" name="image_source" value="{{ old('image_source') ?? $post->image_source}}">
        </div>
    </div>
    <div class="form-group row mb-4">
        <label for="title" class="col-sm-2 col-form-label">Title</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') ?? $post->title }}">
        </div>
    </div>
    <div class="form-group row mb-4">
        <label for="content" class="col-sm-2 col-form-label">Content</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="content" name="content" value="{{ old('content') ?? $post->content }}">
        </div>
    </div>
    <div class="row">
        @foreach ($categories as $category)
        <div class="col-2">
            <div class="form-check mr-4">
                <input type="checkbox" class="form-check-input" name="category[]" value="{{$category->id}}" {{ $post->categories->contains($category) ? 'checked' : ''}}>
                <label class="form-check-label" for="categories" style="color: {{$category->color}}">{{$category->name}}</label>
            </div>
        </div>
        @endforeach
    </div>
    <div class="float-right">
        <button type="submit" class="btn btn-primary mb-2">Submit</button>
    </div>
</form>
@endsection