<?php
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $first_name = $_POST['first_name'];
    $household = $_POST['household'];

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
    if (empty($household)) {
        $errors[] = "Household name is required";
    }






    if (empty($errors)) {

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        require_once 'DAO.php';
        $dao = new DAO();
        $dao->addUser($email,$username,$hashed_password,$household,$first_name);
        header("Location: login.php");
        exit();
    } else {

        $error_message = implode(", ", $errors);
        header("Location: signUp.php?error=$error_message");
        exit();
    }
} else {

    header("Location: error.php");
    exit();
}
?>
