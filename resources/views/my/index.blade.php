@extends('layouts.master')
@section('content')
<form method="post" action="{{url('save')}}">
    <div class="form-group">
        <label for="email">Email address:</label>
        <input type="email" name="email" class="form-control" id="email" value="{{old('email')}}">
    </div>
    <div class="form-group">
        <label for="pwd">Password:</label>
        <input type="password" name="password" class="form-control" id="pwd" value="{{old('password')}}">
        @foreach($errors->get('password') as $error_item)
            <div class="label label-danger">
                {{$error_item}}
            </div>
        @endforeach
    </div>
    <div class="checkbox">
        <label><input type="checkbox"> Remember me</label>
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
    <h1><?php echo asset('css/bootstrap.css');?></h1>

    <h4 style="color: blue">@if(Session::has('name'))
            <p class="alert alert-info">{{ Session::get('name') }}</p>
        @endif</h4>

    <h5>{{asset('fdsfs')}}</h5>
    <h6>{{asset('/resource/assets/sass/app.scss')}}</h6>
    <a href="{{route('get_file')}}">Download file</a>
</form>
@endsection