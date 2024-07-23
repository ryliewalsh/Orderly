<?php session_start()?>
<html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {

            setTimeout(function() {
                $(".error-message").fadeOut();
            }, 1000);
        });
    </script>
</head>

<body>
<div class="header">
    <a class="logo" href="index.php">Orderly.</a>
    <a class="overview <?php echo ($_SERVER['SCRIPT_NAME'] == '/index.php') ? 'active' : ''; ?>" href="index.php">Overview</a>
    <a class="pay <?php echo ($_SERVER['SCRIPT_NAME'] == '/pay.php') ? 'active' : ''; ?>" href="pay.php">Pay</a>
    <a class="plan <?php echo ($_SERVER['SCRIPT_NAME'] == '/plan.php') ? 'active' : ''; ?>" href="plan.php">Plan</a>
    <a class="do <?php echo ($_SERVER['SCRIPT_NAME'] == '/do.php') ? 'active' : ''; ?>" href="do.php">Do</a>
    <a class="about <?php echo ($_SERVER['SCRIPT_NAME'] == '/about.php') ? 'active' : ''; ?>" href="about.php">About</a>
    <div class="header-right">
        <a class="user" href="signUp.php">Join Now!</a>
    </div>
</div>

<?php
if (isset($_SESSION['error_messages'])) {
    foreach ($_SESSION['error_messages'] as $error) {
        echo "<div class='message error-message'>$error</div>";
    }
    unset($_SESSION['error_messages']);
}
?>
<div class="wallpaper">
    <div class="homeContainer">
        <h1 class="homeTitle">Welcome</h1>
        <p class="homeSentence">Ready to be Orderly?</p>

        <a class="homeButton" href="signUp.php">Sign up</a>
        <a class="homeButton" href="login.php">Log in</a>
    </div>
</div>
</body>
</html>
