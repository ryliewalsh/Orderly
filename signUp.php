<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <!-- Add your CSS stylesheets or link them here -->
</head>
<body>
<h2>Sign Up</h2>
<form action="signUp_handler.php" method="post">
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br><br>

    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required><br><br>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required><br><br>


    <label for="first_name">First Name:</label>
    <input type="text" id="first_name" name="first_name" required><br><br>

    <label for="household">Household:</label>
    <input type="text" id="household" name="household" required><br><br>



    <button type="submit">Sign Up</button>
</form>
</body>
</html>
