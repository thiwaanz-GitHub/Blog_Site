@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="card text-center">
        <div class="card-header">
          #{{$post->id}}
        </div>
        <div class="card-body">
          <h5 class="card-title">{{$post->title}}</h5>
          <p class="card-text">{{$post->content}}</p>
          <a href="{{route('home')}}" class="btn btn-primary">Go Back</a>
        </div>
        <div class="card-footer text-muted">
          2 days ago
        </div>
      </div>
    
</div>


@endsection