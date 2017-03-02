@extends('layouts.master')
@section('content')
    {{--upload with form normal --}}
    <form action="/upload/test" enctype="multipart/form-data" method="post">

        <div class="form-group">
            <label class=" col-md-1">Test</label>
            <div class="col-md-2">
                <input type="text" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-default">Submit</button>
        </div>

    </form>

    {{--end update with form normal--}}

@endsection