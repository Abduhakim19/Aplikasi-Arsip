<?php



?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="login.css" />
    <script src="main.js"></script>
</head>
<body>
    <form action="proses.php?aksi=login" method="POST">
    <table>
        <tr>
            <td>Username</td>
        </tr>
        <tr>
            <td><input type="text" name="username" ></td>
        </tr>
        <tr>
            <td>Password</td>
        </tr>
        <tr>
            <td><input type="password" name="pass" ></td>
        </tr>
        <tr>
            <td><input type="submit" value="Submit"></td>
        </tr>
    </table>
    </form>
</body>
</html>