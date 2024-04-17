<html>
<head>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/svg+xml" href="/favicon.svg">

</head>
<body>
<?php
session_start();

// Check if the user is not authenticated and the current page is not the login page
if (!isset($_SESSION['authenticated']) && basename($_SERVER['PHP_SELF']) !== 'login.php') {
    // Redirect the user to the home page or login page
    header("Location: home.php");
    exit();
}

// If the user is on the login page and is already authenticated, redirect to the home page
if (isset($_SESSION['authenticated']) && basename($_SERVER['PHP_SELF']) === 'login.php') {
    header("Location: home.php");
    exit();
}
?>
<div class="header">

    <a class = "logo" href="index.php">Orderly.</a>
    <a class="overview" href="index.php">Overview</a>
    <a class="pay" href="pay.php">Pay</a>
    <a class="plan" href="plan.php">Plan</a>
    <a class="do" href="do.php">Do</a>
    <a class="about" href="about.php">About</a>

    <div class="header-right">

        <a class="user" href="userSettings.php">Welcome home, <span class="username">User</span></a>
    </div>
</div>
</body>

</html>