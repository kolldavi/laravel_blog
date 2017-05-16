@extends('main')
@section('title')
| blog}
@endsection
@section('stylesheets')
  {!!Html::style('css/style.css') !!}
@endsection

@section('content')
    <div class="row">
        <div class="jumbotron">
            <h1 class="text-center">Blog</h1>
        </div>
    </div>
    @foreach($posts as $post)
    <div class="row">
        <div class="col col-md-8 col-md-offset-2">
            <h1>{{$post->title}}</h1>
            <h5>Published Date: {{date('M j, Y h:ia', strtotime($post->created_at))}}</h5>
            <p>
                {{substr($post->body,0,300)}}
                {{strlen($post->body)>300 ? "...":""}}
            </p>
            <a href="{{ route('blog.single', $post->slug) }}" class="btn btn-primary btnOffset">Read More</a>
            <hr>
        </div>
    </div>

    @endforeach
            <div class="row">
        <div class="col-md-12">
            <div class="text-center">
                {!! $posts->links() !!}
            </div>
        </div>
    </div>
@endsection