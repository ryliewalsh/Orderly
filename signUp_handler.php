<?php
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $first_name = $_POST['first_name'];


    $errors = array();
    if (empty($email)) {
        $errors[] = "Email is required";
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
        $dao->addUser($email,$username,$hashed_password,$first_name);
        header("Location: https://orderly-b0075f006315.herokuapp.com/home.php");
        exit();
    } else {

        $error_message = implode(", ", $errors);
        header("Location: https://orderly-b0075f006315.herokuapp.com/home.php");
        exit();
    }
} else {

    header("Location: error.php");
    exit();
}
?>
