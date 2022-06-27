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
        {{-- IMAGE --}}
        <div class="form-group">
            @if ($post->image)
                <img id="uploadPreview" width="100" src="{{asset("storage/{$post->image}")}}" alt="{{$post->title}}">
            @endif
            <label for="image">Aggiungi immagine</label>
            <input type="file" id="image" name="image" onchange="boolpress.previewImage();">
            @error('image')
               <div class="alert alert-danger">{{ $message }}</div>
             @enderror
        </div>
        {{-- PUBLISHED --}}
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="published" name="published">
            <label class="form-check-label" {{old('published', $post->published) ? 'checked' : ''}}  for="published">Published</label>
        </div>
        {{-- CATEGORY --}}
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
        {{-- TAGS --}}
        <div class="form-group">
            <p><strong>Tags</strong></p>
            @foreach ($tags as $tag)
                <div class="form-check form-check-inline">
    
                    @if (old("tags"))
                        <input type="checkbox" class="form-check-input" id="{{$tag->slug}}" name="tags[]" value="{{$tag->id}}" {{in_array( $tag->id, old("tags", []) ) ? 'checked' : ''}}>
                    @else
                        <input type="checkbox" class="form-check-input" id="{{$tag->slug}}" name="tags[]" value="{{$tag->id}}" {{$post->tags->contains($tag) ? 'checked' : ''}}>
                    @endif
                    <label class="form-check-label" for="{{$tag->slug}}">{{$tag->name}}</label>
                </div>
            @endforeach
            @error('tags')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
