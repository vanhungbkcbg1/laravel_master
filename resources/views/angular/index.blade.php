@extends('layouts.master')
@section('content')
    <div ng-app="angular" ng-controller="angularController">
        <h2>Sinhvien data</h2>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Email</th>
                <th>Function</th>
            </tr>
            </thead>
            <tbody>
            <tr ng-repeat="x in sinhviens">
                <td>@{{x.id }}</td>
                <td>@{{ x.email }}</td>
                <td>
                    <button class="btn btn-default">Edit</button>
                    <button class="btn btn-danger">Delete</button>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection

@section('script')
    <script src="{{url('/js/form/angular/app.js')}}"></script>
    <script src="{{url('/js/form/angular/sinhvienService.js')}}"></script>
    <script src="{{url('/js/form/angular/angularController.js')}}"></script>

@endsection