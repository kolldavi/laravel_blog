@extends('main')

@section('title')
| Registrer
@endsection


@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            {!! Form::open() !!}
            
            
            {{ Form::label('name','Name:') }}
            {{ Form::text('name',null, ['class'=>'form-control']) }}
            
            {{ Form::label('email','Email:') }}
            {{ Form::email('email',null, ['class'=>'form-control']) }}
            
            {{ Form::label('password','Password:') }}
            {{ Form::password('password', ['class'=>'form-control']) }}
            
            {{ Form::label('password_confirmation','Confirm Password:') }}
            {{ Form::password('password_confirmation', ['class'=>'form-control']) }}
            
            {{ Form::submit('Registrer',['class' => 'btn btn-primary btn-block btnOffset'] )}}
            
            {!! Form::close() !!}
        </div>
    </div>
@endsection