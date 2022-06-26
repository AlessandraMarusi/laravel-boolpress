@extends('layouts.admin');

@section('content')
    <form action="{{route('admin.posts.update', $post->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{old('title', $post->title)}}" placeholder="Insert Title">
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea name="content" id="content" cols="30" rows="10">{{old('content', $post->content)}}</textarea>
        </div>
        {{-- PUBLISHED --}}
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="published" name="published">
            <label class="form-check-label" {{old('published', $post->published) ? 'checked' : ''}}  for="published">Published</label>
        </div>
        <div class="mb-3">
            <label for="category_id" class="form-label">Category</label>
            <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror">
                <option value="">Select Category</option>
                @foreach ($categories as $category)
                    <option value="{{$category->id}}" {{$category->id == old('category_id', $post->category_id) ? 'selected' : ''}}>{{$category->name}}</option>
                @endforeach
            </select>
            @error('category_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
