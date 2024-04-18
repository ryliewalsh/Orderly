<?php
session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $description = $_POST['description'];
    $due_date = $_POST['due_date'];
    $is_recurring = isset($_POST['is_recurring']) && $_POST['is_recurring'] == '1' ? '1' : '0';

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


        header("Location: https://orderly-b0075f006315.herokuapp.com/do.php");
        exit();
    } else {

        $_SESSION['error_messages'] = $errors;
        header("Location:https://orderly-b0075f006315.herokuapp.com/do.php");
        exit();
    }
} else {

    exit();
}
?>
