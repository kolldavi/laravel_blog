@extends('main')

@section('title')
| {{$post->title}}
@endsection



@section('content')
    <div class="row">
        <div class="col col-md-8 col-md-offset-2">
            <h1>{{ $post->title }}</h1>
            <p>{{ $post->body }}</p>
            <hr>
            <p>The Category is: {{$post->category->name}}</p>
        </div>
    </div>

    <br>

    
    
@endsection