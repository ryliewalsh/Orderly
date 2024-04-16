<?php
session_start();

$username = $_POST['username'];
$password = $_POST['password'];
require_once 'DAO.php';
$dao = new DAO();

$user = $dao->getUser($username);

if ($user && password_verify($password, $user['password_hash'])) {
    $_SESSION['authenticated'] = true;
    $_SESSION['username'] = $username;
    $_SESSION['user_id'] = $user['user_id'];

    header("Location: https://orderly-b0075f006315.herokuapp.com/index.php");
    exit();
} else {
    // Invalid credentials, redirect to the signup page
    header("Location: https://orderly-b0075f006315.herokuapp.com/login.php");
    exit();
}
?>