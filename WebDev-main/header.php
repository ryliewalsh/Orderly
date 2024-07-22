<?php
session_start();
/*
if (isset($_SESSION['authenticated']) && $_SESSION['authenticated']) {
   if (isset($_SESSION['house_id'])) {
        header("Location: /index.php");
        exit();
    } elseif ($_SERVER['SCRIPT_NAME'] !== '/joinHousehold.php') {
        // If the house_id is not set and the current page is not joinHousehold.php, redirect to the joinHousehold page
        header("Location: /joinHousehold.php");
        exit();
    }
  

} else {
    unset($_SESSION['login_failed']);
    header("Location: https://orderly-b0075f006315.herokuapp.com/home.php");
    exit();
}
*/
?>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/svg+xml" href="/favicon.svg">
</head>
<body>
<div class="header">
    <a class="logo" href="index.php">Orderly.</a>
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
