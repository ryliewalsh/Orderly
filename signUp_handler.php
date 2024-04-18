<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $first_name = $_POST['first_name'];

    $errors = array();


    if (!preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $email)) {
        $errors[] = "Invalid email format";
    }

    if (empty($username)) {
        $errors[] = "Username is required";
    }
    if (empty($password)) {
        $errors[] = "Password is required";
    }

    if (empty($first_name)) {
        $errors[] = "First name is required";
    }

    if (empty($errors)) {

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);


        require_once 'DAO.php';
        $dao = new DAO();
        $dao->addUser($email, $username, $hashed_password, $first_name);


        header("Location: https://orderly-b0075f006315.herokuapp.com/login.php");
        exit();
    } else {
        // Handle errors

        $_SESSION['error_message'] = $errors;

        // Redirect back to the form page
        header("Location: https://orderly-b0075f006315.herokuapp.com/home.php");
        exit();
    }
} else {
    // If form is not submitted, redirect to error page
    header("Location: error.php");
    exit();
}
?>
