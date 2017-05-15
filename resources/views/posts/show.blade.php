@extends('main')
@section('title')
| Create View Post
@endsection
@section('stylesheets')
  {!!Html::style('css/style.css') !!}
@endsection

@section('content')
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <h1>{{ $post->title}}</h1>
      <p class="lead">{{ $post->body}}</p>
    </div>
  </div>
@endsection
