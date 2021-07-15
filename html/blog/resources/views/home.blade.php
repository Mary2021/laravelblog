@extends('layout')

@section('title', 'Home')

@section('content')
    <form action="/post" method="POST">
        @csrf
        <div class="mt-3">
            <textarea class="form-control" placeholder="Your thoughts" name="content"></textarea>
        </div>
        <div class="mt-3">
            <input type="submit" class="btn btn-primary" value="Post">
        </div>
    </form>
    @foreach($posts as $post)
    <div class="card mt-3">
        <div class="card-body">
            <p>{{$post->content}}</p>
            <a href="/post/{{$post->id}}">read more</a>
        </div>
        <div class="card-footer text-muted">
            <p>Created by {{$post->user->name}}</p>
            {{$post->created_at->diffForHumans()}}
        </div>
    </div>
    @endforeach
@endsection
