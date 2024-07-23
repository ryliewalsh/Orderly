<?php
session_start();
$errors = array();
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    require_once 'DAO.php';
    $dao = new DAO();
    if (empty($username)) {
        $errors[] = "Username is required";
    }

    if (empty($password)) {
        $errors[] = "Password is required";
    }

    $user = $dao->getUser($username);

    if (empty($errors)) {


        if ($user && password_verify($password, $user['password_hash'])) {
            $_SESSION['authenticated'] = true;
            $_SESSION['username'] = $username;
            $_SESSION['user_id'] = $user['user_id'];


            unset($_POST['password']);
            header("Location: https://orderly-b0075f006315.herokuapp.com/index.php");
            exit();
        } else {
            $errors[] = "Username or password is incorrect";
        }
    }
    $_SESSION['error_messages'] = $errors;
    $_SESSION['username'] = $username;
    header("Location:https://orderly-b0075f006315.herokuapp.com/login.php");
}




if ($_SESSION['authenticated']) {
    header("Location: https://orderly-b0075f006315.herokuapp.com/index.php");
} else {
    header("Location: https://orderly-b0075f006315.herokuapp.com/login.php");
}

exit();
?>
