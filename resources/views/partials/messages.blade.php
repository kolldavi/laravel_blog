
<!--check if  flash success session was made -->
@if (Session::has('success'))
    <div class="alert alert-success" role="alert">
        <strong>Success:</strong> {{Session::get('success')}}
    </div>
@endif

<!--check if validate the data failed in PostControlle -->
@if (count($errors) > 0)
    <div class="alert alert-danger" role="alert">
        <strong>Error:</strong> 
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif