@extends('main')
@section('title')
| Edit Blog Post
@endsection
@section('stylesheets')
  {!!Html::style('css/parsley.css') !!}
    {!!Html::style('css/select2.min.css') !!}
@endsection
@section('content')
  <div class="row">
    <div class="col-md-8">
      <h1>Edit Post</h1>
      <hr>
        
        {!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT','data-parsley-validate'=>'']) !!}
        {{ Form::label('title','Title:')}}
        {{ Form::text('title',null,array('class'=>' form-control','required'=>'','data-parsley-maxlength'=>'255','maxlength'=>"255"))}}
        
        {{ Form::label('slug','Slug:',['class'=>'btnOffset'])}}
        {{ Form::text('slug',null,array('class'=>'form-control ','required'=>'','data-parsley-maxlength'=>'255','maxlength'=>"255",'minlength'=>"5"))}}
        
        {{Form::label('category_id','Category',['class'=>'btnOffset'])}}
        {{Form::select('category_id',$categories,$post->category_id,['class'=>'form-control'])}}
        
				{{ Form::label('tags', 'Tags:', ['class' => 'form-spacing-top']) }}
				{{ Form::select('tags[]', $tags, null, ['class' => 'form-control select2-multi', 'multiple' => 'multiple']) }}
						
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
				    	{{ Form::submit('Save Changes', ['class' => 'btn btn-primary btn-block']) }}
					</div>
					
					<div class="col-sm-6">
					<!-- {!! Html::linkRoute('posts.edit', 'Edit', array($post->id), array('class' => 'btn btn-primary btn-block')) !!} -->
						  <a href="{{ route('posts.index') }}" class="btn btn-primary btn-block">Cancel</a>
					</div>
				{!! Form::close() !!}
				</div>
				<div class="row">
					<div class="col-sm-12">
						 {{Form::open(['route'=>['posts.destroy',$post->id],'method'=>'DELETE'])}}
						{{Form::submit('Delete',['class' => 'btn btn-danger btn-block btnOffset'])}}
						{{Form::close()}}
					</div>
				</div>

			</div>
		</div>

  </div>
@endsection

@section('scripts')
  {!!Html::script('js/parsley.min.js') !!}
   {!!Html::script('js/select2.min.js') !!}
	<script type="text/javascript">

		$('.select2-multi').select2().val({!! json_encode($post->tags()->getRelatedIds()) !!}).trigger('change');
	</script>
@endsection