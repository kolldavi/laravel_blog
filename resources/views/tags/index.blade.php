@extends('main')

@section('title')
| All Tags
@endsection

@section('content')
    <div class="row">
        <div class='col-md-8'>
            <h1>Tags</h1>
            <table class='table'>
                <thead>
                    <th>#</th>
                    <th>Name</th>
                </thead>
                <tbody>
                    @foreach($tags as $tag)
                        <tr>
                            <th>{{$tag->id}}</th>
                            <td>{{ $tag->name }}</td>
                        </tr>
                    @endforeach()
                </tbody>
            </table>
        </div>
         <div class='col-md-4'>
            <div class='well'>
                {!! Form::open(['route'=>'tags.store', 'method'=>'POST']) !!}
                    <h2>Tag</h2>
                    {{Form::label('name','Name:')}}
                    {{Form::text('name',null,['class'=>'form-control','maxlength'=>'255'])}}
                    
                    {{Form::submit('Create New Tag',['class'=>'btn btn-primary btn-block btnOffset'])}}
                {!! Form::close() !!}  
            </div>
        </div>
    </div>

@endsection