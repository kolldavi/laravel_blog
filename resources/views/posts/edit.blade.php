@extends('main')
@section('title')
| Edit Blog Post
@endsection
@section('stylesheets')
  {!!Html::style('css/parsley.css') !!}
@endsection
@section('content')
  <div class="row">
    <div class="col-md-8">
      <h1>Edit Post</h1>
      <hr>
        
        {!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT','data-parsley-validate'=>'']) !!}
        {{ Form::label('title','Title:')}}
        {{ Form::text('title',null,array('class'=>' form-control','required'=>'','data-parsley-maxlength'=>'255','maxlength'=>"255"))}}
        
        {{ Form::label('body','Body:',['class'=>'btnOffset'])}}
        {{ Form::textarea('body',null,array('class'=>'form-control', 'placeholder'=>'enter Text','data-parsley-required'=>"true",'required'=>''))}}
        
    </div>
    	<!-- right edit box -->
    	<div class="col-md-4">
			<div class="well">
				<dl class="dl-horizontal">
					<dt>Create At:</dt>
					<dd>{{ date('M j, Y h:ia', strtotime($post->created_at)) }}</dd>
				</dl>

				<dl class="dl-horizontal">
					<dt>Last Updated:</dt>
					<dd>{{ date('M j, Y h:ia', strtotime($post->updated_at)) }}</dd>
				</dl>
				<hr>
				<div class="row">
				    <div class="col-sm-6">
				    	{{ Form::submit('Save Changes', ['class' => 'btn btn-success btn-block']) }}
					</div>
					
					<div class="col-sm-6">
					<!-- {!! Html::linkRoute('posts.edit', 'Edit', array($post->id), array('class' => 'btn btn-primary btn-block')) !!} -->
						  <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-danger btn-block">Cancel</a>
					</div>

				</div>

			</div>
		</div>
		      {!! Form::close() !!}
  </div>
@endsection

@section('scripts')
  {!!Html::script('js/parsley.min.js') !!}
@endsection