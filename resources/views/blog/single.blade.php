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
            <hr>
            <div class="tags">
				@foreach ($post->tags as $tag)
					<span class="label label-default">{{ $tag->name }}</span>
				@endforeach
			</div>
        </div>
    </div>
    <div class="row">
          <div class="col col-md-8 col-md-offset-2 lrgOffset">
              @foreach($post->comments as $comment)
                  <div class="comment">
                      <p>Name: {{$comment->name}}</p>
                      <p>Comment:<br> {{$comment->comment}}</p>
                      <hr>
                  </div>
              @endforeach
          </div>
    </div>
    <div class="row">
        <div class="col col-md-8 col-md-offset-2 lrgOffset">
            <div id="comment_form">
                {{Form::open(['route'=>['comments.store',$post->id],'method'=>'POST'])}}
                    <div class="row">
                        <div class="col-md-6">
                            {{Form::label('name','Name:')}}
                            {{Form::text('name',null,['class'=>'form-control'])}}
                        </div>
                        <div class="col-md-6">
                            {{Form::label('email','Email:')}}
                            {{Form::text('email',null,['class'=>'form-control'])}}
                        </div>
                        <div class="col-md-12">
                            {{Form::label('comment','Comment:')}}
                            {{Form::textarea('comment',null,['class'=>'form-control', 'rows'=>'5'])}}
                            {{Form::submit('Add Comment',['class'=>'btn btn-success btnOffset'])}}
                        </div>
                        
                    </div>
                {{Form::close()}}
            </div>
        </div>
    </div>

    <br>

    
    
@endsection