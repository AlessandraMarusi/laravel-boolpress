@extends('layouts.admin');

@section('content')
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirm post delete</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Sei sicuro di voler eliminare il post con id: @{{postid}} ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger" @@click="submitForm()">Conferma</button>
                </div>
            </div>
        </div>
    </div>
    <a href="{{route('admin.posts.create')}}" class="btn btn-primary">Create new Post</a>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{session()->get('message')}}
        </div>
    @endif
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Creation Date</th>
            <th scope="col">Edit</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <th scope="row"><a href="{{route('admin.posts.show', $post->id)}}">{{$post->id}}</a></th>
                    <td><a href="{{route('admin.posts.show', $post->id)}}">{{$post->title}}</a></td>
                    <td>{{$post->created_at}}</td>
                    <td><a href="{{route('admin.posts.edit', $post->id)}}" class="btn btn-primary">Edit</a></td>
                    <td>
                        <form action="{{route('admin.posts.destroy', $post->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" @@click="openModal($event, {{$post->id}})"
                                class="btn btn-danger delete">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        
        </tbody>
    </table>
    {{$posts->links()}}
@endsection