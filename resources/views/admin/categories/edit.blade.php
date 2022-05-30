@extends('layouts.app')

@section('content')
<h1 class="text-center my-5">Edit {{$category->name}} Category</h1>
<form class="w-50 m-auto clearfix" action="{{ route('admin.categories.update', $category) }}" method='post'>
    @csrf
    @method('PUT')

    <div class="form-group row mb-4">
        <label for="name" class="col-sm-2 col-form-label">Category Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="category_name" name="name" value="{{ old('name') ?? $category->name}}">
        </div>
    </div>
    <div class="form-group row mb-4">
        <label for="title" class="col-sm-2 col-form-label">Choose color</label>
        <div class="col-sm-10">
            <input type="color" class="form-control" id="category_color" name="color" value="{{ old('color') ?? $category->color }}">
        </div>
    </div>
    <div class="float-right">
        <button type="submit" class="btn btn-primary mb-2">Submit</button>
    </div>
</form>
<form class="w-50 m-auto" action="{{route('admin.categories.destroy', $category)}}" method="post">
    @csrf
    @method('DELETE')
    <button class="btn btn-danger fw-bold" type="submit">Delete Category</button>
</form>
@endsection