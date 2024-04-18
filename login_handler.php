<?php
session_start();

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    require_once 'DAO.php';
    $dao = new DAO();

    $user = $dao->getUser($username);

    if ($user && password_verify($password, $user['password_hash'])) {

        $_SESSION['authenticated'] = true;
        $_SESSION['username'] = $username;
        $_SESSION['user_id'] = $user['user_id'];


        unset($_POST['password']);
    } else {

        $_SESSION['login_failed'] = true;
    }
}




if ($_SESSION['authenticated']) {
    header("Location: https://orderly-b0075f006315.herokuapp.com/index.php");
} else {
    header("Location: https://orderly-b0075f006315.herokuapp.com/login.php");
}

exit();
?>
