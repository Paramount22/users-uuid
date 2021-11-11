@extends('layouts.app')

@section('content')
{{--  <h2 class="mb-3">{{$user->name}}</h2>--}}
<div class="row justify-content-center">
    <div class="col-12">
        <header class="d-flex justify-content-between align-items-center mb-4">
            <h2>
                <span class="lead">posts by</span>
                {{$user->name}}
            </h2>

            <p class="lead">
                {{ Str::plural('Post', $user->posts->count()) }}: {{$user->posts->count()}}
            </p>
        </header>
    </div>
</div>
<div class="row">
    @foreach($user->posts as $post)

        <div class="col-md-4">
            <div class="card mb-4 shadow">
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
