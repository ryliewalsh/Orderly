<?php
session_start();

if (isset($_SESSION['error_messages'])) {

    foreach ($_SESSION['error_messages'] as $error) {
        echo "<tr><td>{$error}</td></tr>";
    }
    // Unset the error messages after displaying them
    unset($_SESSION['error_messages']);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $description = $_POST['description'];
    $due_date = $_POST['due_date'];
    $is_recurring = $_POST['is_recurring'];

    $errors = array();
    if (empty($description)) {
        $errors[] = "Description is required";
    }
    if (empty($due_date)) {
        $errors[] = "Due date is required";
    }

    if (empty($errors)) {
        require_once 'DAO.php';
        $dao = new DAO();
        $dao->addChore($description,  $due_date, $is_recurring);

        // Redirect to a success page or perform other actions
        header("Location: https://orderly-b0075f006315.herokuapp.com/do.php");
        exit();
    } else {

        $_SESSION['error_messages'] = $errors;
        header("Location:https://orderly-b0075f006315.herokuapp.com/do.php"); // Replace form_page.php with the actual page URL
        exit();
    }
} else {
    // Handle case when the form is not submitted
    // This block may be empty or you can include other logic
    exit();
}
?>
