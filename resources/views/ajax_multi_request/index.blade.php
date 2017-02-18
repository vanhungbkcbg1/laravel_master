@extends('layouts.master')
@section('content')
    <button id="send" type="button" class="btn btn-default" >Request</button>

    <script type="text/javascript">
        $("#send").click(function () {

            var a= $.get('/request1');
            var b= $.get('/request2');

            $.when(a,b).done(function (a,b) {
                debugger;
                console.log(a);
                console.log(b);

            })
        });

    </script>
@endsection