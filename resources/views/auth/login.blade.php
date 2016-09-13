<html>
<head></head>
<title>
    register
</title>
<body>
<form action="{{url('authentication')}}" method="post">
    <input type="text" placeholder="enter your email" name="email">
    <input type="text" placeholder="enter your password" name="password">
    <input type="submit" value="Login">
</form>
</body>
</html>