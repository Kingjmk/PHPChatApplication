<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../main.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="../main.js1"></script>
    

    <title>PHP Project</title>
</head>

<body>
    <div class="container">
        <h1 id="loginname"style="text-align:right;width:80%;"></h1>
        <form id="logout">
            <input type="hidden" name="requestID" value="3">
            <input type="submit" class="submit" value="Logout">
        </form>

        <form id="regform" >
            <h1>Register Form</h1>
            <input type="text" name="username" id="u1" placeholder="username">
            <input type="email" name="email" id="e1" placeholder="email">
            <input type="password" name="password1" id="p11" placeholder="password">
            <input type="password" name="password2" id="p12" placeholder="password again">
            <input type="hidden" name="requestID" value="1">
            <input type="submit" class="submit" value="Register">

        </form>

       
        <form  id="loginform">
            <h1>Login Form</h1>
            <input type="email" name="email" id="e2" placeholder="email">
            <input type="password" name="password1" id="p2" placeholder="password">
            <input type="hidden" name="requestID" value="2">
            <input type="submit" class="submit" value="Login">
        </form>

        <p id="err"></p>

    </div>
</body>
</html>