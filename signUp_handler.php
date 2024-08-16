<?php
session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = htmlspecialchars($_POST['email']);
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);
    $first_name = htmlspecialchars($_POST['first_name']);

    $errors = array();

    if (empty($username)) {
        $errors[] = "Username is required";
    } else {
        require_once 'DAO.php';
        $dao = new DAO();
        $existingUser = $dao->findUser($username);
        if ($existingUser) {
            $errors[] = "Username already exists";
        }
    }
    if (empty($password)) {
        $errors[] = "Password is required";
    } elseif (!preg_match("/^(?=.*[A-Z])(?=.*[!@#$%^&*])(?=.{8,})/", $password)) {

        $errors[] = "Password must be at least 8 characters long and contain at least one uppercase letter and one special character";
    }
    if (empty($first_name)) {
        $errors[] = "First name is required";
    }

    if (empty($errors)) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        require_once 'DAO.php';
        $dao = new DAO();
        $dao->addUser($email, $username, $hashed_password, $first_name);
        unset($_SESSION['inputs']);
        header("Location: https://orderly-b0075f006315.herokuapp.com/login.php");
        exit();
    } else {

        $_SESSION['error_messages'] = $errors;
        $_SESSION['inputs'] = array(
            'email' => $email,
            'username' => $username,
            'first_name' => $first_name
        );

        header("Location: https://orderly-b0075f006315.herokuapp.com/signUp.php");
        exit();
    }


}


