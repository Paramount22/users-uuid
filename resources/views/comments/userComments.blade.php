@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <header class="d-flex justify-content-between align-items-center mb-4">
                <h2>
                    <span class="lead">comments by</span>
                    {{$user->name}}
                </h2>

                <p class="lead">
                    {{ Str::plural('Comment', $commentsCount) }}: {{$commentsCount}}
                </p>
            </header>
        </div>
    </div>

    <div class="row justify-content-center">
        @forelse($comments as $comment)
            <div class="col-md-8 mb-3">
                <div class="card shadow">
                    <div class="card-header d-flex justify-content-between">
                        <a href="{{route('user.comments', $comment->user)}}">{{$comment->user->name}}</a>
                        <span>
                            post: <a href="{{route('posts.show', $comment->post)}}">{{$comment->post->title}}</a>
                        </span>
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

    <div class="row justify-content-center">
        <div class="col-md-8">
            {{$comments->links()}}
        </div>
    </div>


@endsection
