<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
</head>
<body>
<h2>Sign Up</h2>

<?php
session_start();
if (isset($_SESSION['errors']) && !empty($_SESSION['errors'])) {
    echo '<div style="color: red;">';
    foreach ($_SESSION['errors'] as $error) {
        echo $error . "<br>";
    }
    echo '</div>';
    unset($_SESSION['errors']);
}
?>

<?php if (!empty($errors)): ?>
    <div style="color: red;">
        <?php foreach ($errors as $error): ?>
            <div><?php echo $error; ?></div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<form action="signUp_handler.php" method="post">
    <label for="email">Email:</label>
    <input type="email" id="email" name="email"><br><br>

    <label for="username">Username:</label>
    <input type="text" id="username" name="username" ><br><br>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" ><br><br>

    <label for="first_name">First Name:</label>
    <input type="text" id="first_name" name="first_name" ><br><br>

    <button type="submit">Sign Up</button>
</form>

</body>
</html>
