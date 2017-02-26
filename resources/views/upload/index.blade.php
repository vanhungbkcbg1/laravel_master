@extends('layouts.master')
@section('content')
    {{--upload with form normal --}}
    {{--<form action="/upload" enctype="multipart/form-data" method="post">--}}
        {{--<div class="form-group">--}}
            {{--<label for="email">Email address:</label>--}}
            {{--<input type="email" name="email" value="{{old('email')}}" class="form-control" id="email">--}}
        {{--</div>--}}
        {{--<div class="form-group">--}}
            {{--<label for="pwd">Password:</label>--}}
            {{--<input type="password" name="password" value="{{old('password')}}" class="form-control" id="pwd">--}}
        {{--</div>--}}
        {{--<div class="form-group">--}}
            {{--<label for="pwd">File:</label>--}}
            {{--<input type="file" name="file" value="{{old('file')}}" class="form-control">--}}
        {{--</div>--}}
        {{--<button type="submit" class="btn btn-default">Submit</button>--}}
    {{--</form>--}}

    {{--end update with form normal--}}

        <div class="form-group">
            <input type="file" id="file">
            <button class="btn btn-default">Upload</button>
        </div>

    <script>

        $(document).ready(function () {

            $("#file").change(function () {

                var file=this.files[0];
                console.log(file);
                var formData=new FormData();
                formData.append('file',file);

                $.ajax({
                    url : '/upload',
                    type : 'POST',
                    data : formData,
                    processData: false,  // tell jQuery not to process the data
                    contentType: false,  // tell jQuery not to set contentType
                    success : function(data) {
                        if(data.status=='success'){
                            alert('upload success');
//                            location.href='/upload';
                        }else{
                            alert(data.msg);
                        }
                    }
                });
            });
        });
    </script>
@endsection