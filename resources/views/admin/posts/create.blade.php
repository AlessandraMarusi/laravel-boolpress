@extends('layouts.admin');

@section('content')
    <form action="{{route('admin.posts.store')}}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}" placeholder="Insert Title">
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea name="content" id="content" cols="30" rows="10">{{old('content')}}</textarea>
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="published" name="published">
            <label class="form-check-label" {{old('published') ? 'checked' : ''}}  for="published">Published</label>
        </div>
        <div class="mb-3">
            <label for="category_id" class="form-label">Category</label>
            <select name="category_id" id="category_id">
                <option value="">Select Category</option>
                @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
            
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection