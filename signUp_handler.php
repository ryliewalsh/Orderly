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
    // Validate form data (you can add more validation if needed)
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



    // If there are no validation errors, proceed to process the data
    if (empty($errors)) {
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        require_once 'DAO.php';
        $dao = new DAO();
        $dao->addUser($email,$username,$hashed_password,$household,$first_name);
        header("Location: login.php"); // Change index.php to the desired page
        exit();
    } else {
        // If there are validation errors, redirect back to the signup page with error messages
        $error_message = implode(", ", $errors);
        header("Location: signUp.php?error=$error_message");
        exit();
    }
} else {
    // If the form is not submitted via POST method, redirect to an error page or display an error message
    header("Location: error.php");
    exit();
}
?>
