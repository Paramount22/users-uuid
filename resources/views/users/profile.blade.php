@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h4>{{$user->name}}</h4>
                </div>
                <div class="card-body">
                    {{$user->email}}
                </div>
            </div>
        </div>
    </div>



@endsection
