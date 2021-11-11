@extends('layouts.app')

@section('content')
    <h1 class="text-center mb-4">Posts</h1>
    <div class="row">
        @foreach($posts as $post)
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

    {{$posts->links()}}

@endsection
