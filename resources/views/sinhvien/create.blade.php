@extends('layouts.master')
@section('content')
    <form action="{{route('sinhvien_save')}}" enctype="multipart/form-data" method="post">
        <div class="form-group">
            <label for="email">Email address:</label>
            <input type="email" name="email" value="{{old('email')}}" class="form-control" id="email">
        </div>
        <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" name="password" value="{{old('password')}}" class="form-control" id="pwd">
        </div>
        <div class="form-group">
            <label for="pwd">File:</label>
            <input type="file" name="file" value="{{old('file')}}" class="form-control">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
@endsection