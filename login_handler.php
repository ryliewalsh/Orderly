<?php
session_start();

$username = $_POST['username'];
$password = $_POST['password'];

if ($username == 'try' && $password == 'abc123') {
    $_SESSION['authenticated'] = true;
    echo "Authenticated!";
    header("Location: https://orderly-b0075f006315.herokuapp.com/index.php");
    exit();
} else {
    echo "Invalid credentials!";
    header("Location: https://orderly-b0075f006315.herokuapp.com/signUp.php");
    exit();
}
?>