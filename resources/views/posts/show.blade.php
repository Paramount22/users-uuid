@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h3>{{$post->title}}</h3>
                </div>
                <div class="card-body">
                    {{$post->body}}
                </div>
                <div class="card-footer d-flex justify-content-between">
                    <p class="card-text">
                        <a href="{{route('users.show', $post->user)}}">{{$post->user->name}}</a>
                    </p>

                    <p class="card-text">
                        {{$post->created_at->diffForHumans()}}
                    </p>

                </div>
            </div>
        </div>

    </div>
    <div class="row justify-content-center mt-4">
        <div class="col-md-10">
            <div class="comments-header d-flex justify-content-between">
                <h4>Comments</h4>

                <p>
                 <strong>
                     {{ Str::plural('Comment', $post->comments->count()) }}: {{$post->comments->count()}}
                 </strong>
                </p>

            </div>


        </div>
    </div>

    <div class="row justify-content-center mt-4">
        @forelse($post->comments as $comment)
            <div class="col-md-10 mb-3">
                <div class="card shadow">
                    <div class="card-header">
                        <a href="{{route('user.comments', $comment->user)}}">{{$comment->user->name}}</a>
                    </div>

                    <div class="card-body">
                        {{$comment->text}}

                        <p class="card-text mt-3 lead">
                           <small>{{$comment->created_at->diffForHumans()}}</small>
                        </p>

                    </div>

                </div>
            </div>
        @empty
            <div class="col-md-10">
                <div class="alert alert-warning" role="alert">
                    No comments yet.
                </div>
            </div>

        @endforelse
    </div>


@endsection
