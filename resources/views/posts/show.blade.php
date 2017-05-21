@extends('main')
@section('title')
| Create View Post
@endsection


@section('content')

	<div class="row">
		<div class="col-md-8">
			<h1>{{ $post->title }}</h1>
			<p class="lead">{{ $post->body }}</p>
			<hr>
			<div class="tags">
				@foreach ($post->tags as $tag)
					<span class="label label-default">{{ $tag->name }}</span>
				@endforeach
			</div>
			<br>
		</div>

		<div class="col-md-4">
			<div class="well">
				<dl class="dl-horizontal">
					<label>URL Slug:</label>
					<!--<dd><a href="{{ url($post->slug) }}">{{$post->slug}}</a></dd>-->
					<p><a href="{{ route('blog.single',$post->slug) }}">{{$post->slug}}</a></p>	
				</dl>
				<dl class="dl-horizontal">
					<label>Create At:</label>
					<p>{{ date('M j, Y h:ia', strtotime($post->created_at)) }}</p>
				</dl>

				<dl class="dl-horizontal">
					<label>Last Updated:</label>
					<p>{{ date('M j, Y h:ia', strtotime($post->updated_at)) }}</p>
				</dl>
				
				<dl class="dl-horizontal">
					<label>Category:</label>
					<p>{{ $post->category->name }}</p>
				</dl>
				<hr>
				<div class="row">
					<div class="col-sm-6">
					<!--	{!! Html::linkRoute('posts.edit', 'Edit', array($post->id), array('class' => 'btn btn-primary btn-block ')) !!} -->
						  <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary btn-block">Edit</a>
					</div>
					<div class="col-sm-6">
						{{Form::open(['route'=>['posts.destroy',$post->id],'method'=>'DELETE'])}}
						{{Form::submit('Delete',['class' => 'btn btn-danger btn-block'])}}
						{{Form::close()}}
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						  <a href="{{ route('posts.index') }}" class="btn btn-success btn-block btnOffset">View All</a>
					</div>
				</div>

			</div>
		</div>
	</div>

@endsection
