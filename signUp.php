
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>

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

    <label for="household">Key:</label>
    <input type="text" id="household" name="household" required>
    <button type="button" onclick="makeKey()">Need Key?</button>



    <button type="submit">Sign Up</button>
</form>
<script>
     function makeKey() {
        let r = (Math.random() + 1).toString(36).substring(7);
        document.getElementById("household").value = r;
    }
</script>
</body>
</html>

