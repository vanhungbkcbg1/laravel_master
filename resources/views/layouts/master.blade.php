<html>
<head></head>
<title>Menu</title>
<link rel="stylesheet" href="{{url('css/bootstrap.css')}}">
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
    </div>
</div>


</body>
</html>