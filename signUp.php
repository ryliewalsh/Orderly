<?php ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="style.css">
    <style>
body{ font: 14px sans-serif; }
        .wrapper{ width: 360px; padding: 20px; }
        /* Apply the same styles as defined in style.css */
        .form-group {
    margin-bottom: 20px;
        }

        .form-group label {
    display: block;
    margin-bottom: 5px;
            font-weight: bold;
        }

        .form-control {
    width: 100%;
    padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .btn-primary {
    display: block;
    width: 100%;
    padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            text-align: center;
            text-decoration: none;
            cursor: pointer;
        }

        .btn-primary:hover {
    background-color: #0056b3;
        }
    </style>
</head>
<body>
<div class="wrapper">
    <h2>Sign Up</h2>
    <p>Please fill this form to create an account.</p>
    <form>
        <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" class="form-control">
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control">
        </div>
        <div class="form-group">
            <label>Confirm Password</label>
            <input type="password" name="confirm_password" class="form-control">
        </div>
        <div class="form-group">
            <a href="home.php" class="btn btn-primary">Sign In</a>
        </div>
        <p>Already have an account? <a href="login.php">Login here</a>.</p>
    </form>
</div>
</body>
</html>
