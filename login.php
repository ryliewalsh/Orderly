<?php
if (isset($_SESSION['authenticated'])) {
    session_unset();
    session_destroy();


}
?>


<html>
<head>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/svg+xml" href="/favicon.svg">
</head>
<body>
<h1>Login Page</h1>
<form method="post" action="login_handler.php"/>
<div>Username <input type="text" name="username"/></div>
<br/>
<div>Password <input type="password" name="password"/></div>
<br/>
<div><input type="submit" value="Login"></div>
</form>

</body>
</html>