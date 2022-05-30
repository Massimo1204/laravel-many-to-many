@extends('layouts.app')

@section('content')
<h1 class="text-center my-5">Create a new Category</h1>
<form class="w-50 m-auto clearfix" action="{{ route('admin.categories.store') }}" method='post'>
    @csrf

    <div class="form-group row mb-4">
        <label for="name" class="col-sm-2 col-form-label">Category Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="category_name" name="name" value="{{ old('name') ?? ''}}">
        </div>
    </div>
    <div class="form-group row mb-4">
        <label for="title" class="col-sm-2 col-form-label">Choose color</label>
        <div class="col-sm-10">
            <input type="color" class="form-control" id="category_color" name="color" value="{{ old('color') ?? '#2ee809' }}">
        </div>
    </div>
    <div class="float-right">
        <button type="submit" class="btn btn-primary mb-2">Submit</button>
    </div>
</form>
@endsection