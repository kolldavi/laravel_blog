@extends('main')

@section('title')
| All Posts
@endsection

@section('content')
    <div class="row">
        <div class="col-md-10">
            <h1>All Posts</h1>
        </div>
        <div col-md-2>
            <a href="{{route('posts.create')}}" class="btn btn-primary btnOffset">Create New Post</a>
        </div>
        <div row>
            <div class="col-md-12">
                <table class="table table-striped table-responsive">
                    <thead>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Body</th>
                        <th>Create At</th>
                        <th>blank</th>
                    </thead>
                    <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <th>{{$post->id}}</th>
                                <td>{{$post->title}}</td>
                                <td>
                                    {{substr($post->body,0,50)}}
                                    {{ strlen($post->body) > 50 ? "..." : ""}}
                                </td>
                                <td>{{ $post->created_at->format('F d, Y')}}</td>
                                <td>
                                    <a href="{{route('posts.show',$post->id)}}" class='btn btn-default'>View</a> 
                                    <a href="{{route('posts.edit',$post->id)}}" class='btn btn-default'>Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="text-center">
                    {!! $posts->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection