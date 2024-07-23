<?php
session_start();
$errors = array();

if (isset($_SESSION['authenticated']) && $_SESSION['authenticated']) {
   if (isset($_SESSION['house_key'])) {
        header("Location: /index.php");
        exit();
    }


} else {
    $errors[] = "Join or log in to experience Orderly.";
    $_SESSION['error_messages'] = $errors;
    header("Location: https://orderly-b0075f006315.herokuapp.com/home.php");
    exit();
}

?>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/svg+xml" href="/favicon.svg">
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
        <a class="user" href="userSettings.php">Account Settings</a>

    </div>
</div>
</body>
</html>
