@extends('layouts.master')
@section('content')
    <a href="{{route('sinhvien_create')}}">
        <button class="btn btn-info pull-right">Add</button>
    </a>
    @if(session('message'))
        <div class="alert alert-danger">{{session('message')}}</div>
    @endif
    {{ $data->links() }}
    <div class="row">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Email</th>
                <th>Password</th>
                <th>File</th>
            </tr>
            </thead>
            <tbody>

            @foreach($data as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->password}}</td>
                    <td>
                        <a target="_blank" href="{{route('file_view',array('file'=>$item->image))}}">View</a>
                    </td>
                </tr>
            @endforeach


            </tbody>
        </table>
    </div>
    {{ $data->links() }}
@endsection