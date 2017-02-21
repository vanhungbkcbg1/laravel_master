@extends('layouts.master')
@section('content')
    <button id="send" type="button" class="btn btn-default" >Request</button>

    <script type="text/javascript">
        $("#send").click(function () {

            var a= $.get('/request1ss').done(function(data){

                debugger;
                console.log(data);
            });
            var b= $.get('/request2').done(function (data) {
                debugger;
                console.log(data);
            });

            $.when(a,b).done(function (a,b) {
                debugger;
                console.log(a);
                console.log(b);

            }).fail(function (e) {
                debugger;
                console.log(e);
            })
        });

    </script>
@endsection