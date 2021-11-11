@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <header class="d-flex justify-content-between">
                <h1 class="text-center mb-4">My Posts</h1>
                <p class="lead">
                {{ Str::plural('Post', auth()->user()->posts()->count()) }}:
                    {{auth()->user()->posts()->count()}}
                </p>
            </header>

        </div>
    </div>



    <div class="row">
        @foreach($userPosts as $post)
            <div class="col-md-4">
                <div class="card mb-4 shadow ">
                    <div class="card-header">
                        {{$post->title}}
                    </div>
                    <div class="card-body">
                        {{ Str::limit($post->body, 50) }}

                        <p class="card-text mt-3">
                            <a class="btn btn-sm btn-dark" href="{{route('posts.show', $post)}}">read more</a>
                        </p>

                        <p class="card-text mt-2 d-flex justify-content-between">
                            <a href="{{route('users.show', $post->user->uuid)}}" class="text-dark">
                                {{$post->user->name}}
                            </a>

                            <span>
                            <i class="fas fa-comment"></i> {{$post->comments->count()}}
                        </span>
                        </p>
                    </div>

                </div>
            </div>
        @endforeach
    </div>

@endsection
