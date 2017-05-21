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
              <h3 class="comments_title"><span class="glyphicon glyphicon-comment"></span>{{$post->comments()->count()}} comments</h3>
              @foreach($post->comments as $comment)
                  <div class="comment">
                      <div class="author_info">
                           <img src="{{ "https://www.gravatar.com/avatar/" . md5(strtolower(trim($comment->email))) . "?s=50&d=wavatar" }}" class="author_img">
                            <div class="author_name">
                                <h4>{{$comment->name}}</h4>
                                <p class="author-time">{{ date('M j, Y h:ia',strtotime($comment->created_at)) }}</p>
                            </div>
                      </div>
                      <div class="comment_content">
                          {{$comment->comment}}
                      </div>
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