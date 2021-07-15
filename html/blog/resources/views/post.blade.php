@extends('layout')

@section('title', 'Post')

@section('content')
        <div class="card mt-3">
            <div class="card-body">
                {{$post->content}}
            </div>
            <div class="card-footer text-muted">
                <p>Created by {{$post->user->name}}</p>
                {{$post->created_at->diffForHumans()}}
            </div>
        </div>
        @foreach($post-> comments as $comment)
        <div class="alert alert-dark mt-3">
                {{$comment->content}}
                <p>Created by {{$comment->user->name}}</p>
        </div>
        @endforeach
@endsection

