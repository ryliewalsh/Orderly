<?php
session_start();
 if (isset($_SESSION['authenticated'])){
     unset($_SESSION['authenticated']);

 }
if (isset($_SESSION['error_messages'])) {
    foreach ($_SESSION['error_messages'] as $error) {
        echo "<div class='message'>$error</div>";
    }
    unset($_SESSION['error_messages']);
}
?>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/svg+xml" href="/favicon.svg">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#loginForm').submit(function(event) {
                event.preventDefault();

                var username = $('#username').val().trim();
                var password = $('#password').val().trim();
                if (username === '' || password === '') {

                    $('#errorMessage').text('Username and password are required').show();
                    return;
                }


                this.submit();
                $('#username').val('');
                $('#password').val('');
            });
        });
    </script>
</head>
<body>
<h1>Login Page</h1>
<form method="post" action="login_handler.php">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" autocomplete="off"><br><br>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" autocomplete="off"><br><br>

    <div><input type="submit" value="Login"></div>
</form>
</form>

</body>
</html>
