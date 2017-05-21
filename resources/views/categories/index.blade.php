@extends('main')

@section('title')
| All Categories
@endsection

@section('content')
    <div class="row">
        <div class='col-md-8'>
            <h1>Categories</h1>
            <table class='table'>
                <thead>
                    <th>#</th>
                    <th>Name</th>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <th>{{$category->id}}</th>
                            <td>{{ $category->name }}</td>
                        </tr>
                    @endforeach()
                </tbody>
            </table>
        </div>
         <div class='col-md-4'>
            <div class='well'>
                {!! Form::open(['route'=>'categories.store']) !!}
                    <h2>Category</h2>
                    {{Form::label('name','Name:')}}
                    {{Form::text('name',null,['class'=>'form-control','maxlength'=>'255'])}}
                    
                    {{Form::submit('Create New Category',['class'=>'btn btn-primary btn-block btnOffset'])}}
                {!! Form::close() !!}  
            </div>
        </div>
    </div>

@endsection