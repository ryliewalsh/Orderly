<?php
session_start();

$username = $_POST['username'];
$password = $_POST['password'];
require_once 'DAO.php';
$dao = new DAO();

$user = $dao->getUser($username);

if ($user && password_verify($password, $user['password_hash'])) {
    // Successful login
    $_SESSION['authenticated'] = true;
    $_SESSION['username'] = $username;
    $_SESSION['user_id'] = $user['user_id'];

    // Clear the session flag for unsuccessful login attempts
    unset($_SESSION['login_failed']);

    // Redirect to the home page
    header("Location: https://orderly-b0075f006315.herokuapp.com/index.php");
    exit();
} else {
    // Invalid credentials
    $_SESSION['login_failed'] = true;

    // Redirect back to the login page
    header("Location: https://orderly-b0075f006315.herokuapp.com/home.php");
    exit();
}
?>
