@extends('main')

@section('title')
| Login
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            {!! Form::open() !!}
            
            {{ Form::label('email','Email:') }}
            {{ Form::email('email',null, ['class'=>'form-control']) }}
            
            {{ Form::label('password','Password:') }}
            {{ Form::password('password', ['class'=>'form-control']) }}
            
            {{ Form::label('remeber','Remember Me:') }}
            {{ Form::checkbox('remeber')}}
                <br>
            {{ Form::submit('login',['class' => 'btn btn-primary btn-block '] )}}
            
            {!! Form::close() !!}
            
             <a href="{{route('register')}}" class="btn btn-default btn-block btnOffset">Register</a>
        </div>
    </div>
@endsection