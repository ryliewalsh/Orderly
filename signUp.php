<?php
include_once("header.php");


if (isset($_SESSION['error_messages'])) {
    foreach ($_SESSION['error_messages'] as $error) {
        echo "<div class='message'>$error</div>";
    }
    unset($_SESSION['error_messages']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Sign Up</title>
</head>
<body>
<div class="signup-form">
<h2>Sign Up</h2>


<form action="signUp_handler.php" method="post">
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="<?php echo isset($_SESSION['inputs']['email']) ? htmlspecialchars($_SESSION['inputs']['email']) : ''; ?>"><br><br>

    <label for="username">Username:</label>
    <input type="text" id="username" name="username" value="<?php echo isset($_SESSION['inputs']['username']) ? htmlspecialchars($_SESSION['inputs']['username']) : ''; ?>"><br><br>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password"><br><br>

    <label for="first_name">First Name:</label>
    <input type="text" id="first_name" name="first_name" value="<?php echo isset($_SESSION['inputs']['first_name']) ? htmlspecialchars($_SESSION['inputs']['first_name']) : ''; ?>"><br><br>

    <button type="submit">Sign Up</button>
</form>
</div>
</body>
</html>
