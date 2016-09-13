<html>
<head></head>
<title>
    register
</title>
<body>
<form action="{{url('user/register')}}" method="post">
    <input type="text" placeholder="enter your email" name="email">
    <input type="text" placeholder="enter your password" name="password">
    <input type="submit" value="Register">
</form>
</body>
</html>