<html>
<head>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/svg+xml" href="/favicon.svg">

</head>
<body>
<?php
session_start();

if (isset($_SESSION['authenticated']) && $_SESSION['authenticated']) {
    // User is authenticated
} else {
    // User is not authenticated
    header("Location: /login.php");
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