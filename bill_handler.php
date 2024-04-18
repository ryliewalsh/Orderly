<?php
session_start();


$errors = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize user_id
    $user_id = filter_input(INPUT_SESSION, 'user_id', FILTER_VALIDATE_INT);
    if ($user_id === false) {

        $errors[] = "Invalid user ID";
    }

    // Sanitize and validate description
    $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
    if (empty($description)) {

        $errors[] = "Description is required";
    }

    // Validate due date
    $due_date = filter_input(INPUT_POST, 'due_date', FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^\d{4}-\d{2}-\d{2}$/")));
    if ($due_date === false) {

        $errors[] = "Invalid due date format";
    }

    // Validate and sanitize amount
    $amount = filter_input(INPUT_POST, 'amount', FILTER_VALIDATE_FLOAT);
    if ($amount === false) {

        $errors[] = "Invalid amount format";
    } elseif ($amount <= 0) {
        $errors[] = "Amount must be a positive number";
    }


    if (empty($errors)) {

    } else {

        $_SESSION['error_messages'] = $errors;

        header("Location: form_page.php");
        exit();
    }
} else {

    $_SESSION['error_messages'] = array("Invalid request method");
    header("Location: form_page.php");
    exit();
}
?>
