<?php
session_start();
if (isset($_SESSION['authenticated']) && $_SESSION['authenticated']) {

    header("Location: login.php");
    exit();
}
?>
<html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>

</head>
<body>
<a href = 'signUp.php'>Sign up</a>
<a href = 'login.php'>Log in</a>
</body>
</html>
