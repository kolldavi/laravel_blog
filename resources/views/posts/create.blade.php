@extends('main')
@section('title')
| Create New Post
@endsection
@section('stylesheets')
  {!!Html::style('css/parsley.css') !!}
@endsection
@section('content')
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <h1>Create New Post</h1>
      <hr>
      {!! Form::open(array('route' =>'posts.store','data-parsley-validate'=>''))!!}
        {{ Form::label('title','Title:')}}
        {{ Form::text('title',null,array('class'=>'form-control','required'=>'','data-parsley-maxlength'=>'255','maxlength'=>"255"))}}
        
        {{ Form::label('slug','Slug:')}}
        {{ Form::text('slug',null,array('class'=>'form-control','required'=>'','data-parsley-maxlength'=>'255','maxlength'=>"255",'minlength'=>"5"))}}
        
        {{ Form::label('body','Body:')}}
        {{ Form::textarea('body',null,array('class'=>'form-control', 'placeholder'=>'enter Text','data-parsley-required'=>"true",'required'=>''))}}
        
        {{ Form::submit('Create New Post',array('class'=>'btn btn-success btn-lg btn-block btnOffset')) }}
      {!! Form::close() !!}
    </div>
    
  </div>
@endsection

@section('scripts')
  {!!Html::script('js/parsley.min.js') !!}
@endsection