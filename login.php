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
<form id="loginForm" method="post" action="login_handler.php">
    <div>Username <input type="text" name="username" id="username" autocomplete="off"></div>
    <br/>
    <div>Password <input type="password" name="password" id="password" autocomplete="off"></div>
    <br/>
    <div><input type="submit" value="Login"></div>
</form>
<div id="errorMessage" style="color: red; display: none;"></div>
</body>
</html>
