<html>
<head></head>
<title>Menu</title>
<link rel="stylesheet" href="{{url('css/bootstrap.css')}}">
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.1/angular.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/angular.js/1.2.16/angular-resource.min.js"></script>
<body>
<div class="container">
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">WebSiteName</a>
            </div>
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#">Page 1</a></li>
                <li><a href="#">Page 2</a></li>
                <li><a href="#">Page 3</a></li>
            </ul>
        </div>
    </nav>

    <div class="row">
        @yield('content')
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <p>The .navbar-fixed-bottom class makes the navigation bar stay at the bottom.</p>
        </div>
        <div class="col-md-3">
            <p>The .navbar-fixed-bottom class makes the navigation bar stay at the bottom.</p>
        </div>
        <div class="col-md-3">
            <p>The .navbar-fixed-bottom class makes the navigation bar stay at the bottom.</p>
        </div>
        <div class="col-md-3">
            <p>The .navbar-fixed-bottom class makes the navigation bar stay at the bottom.</p>
        </div>
        <div class="clearfix visible-lg"></div>
        {{$count}}
    </div>
</div>

@section('script')

@show
</body>
</html>