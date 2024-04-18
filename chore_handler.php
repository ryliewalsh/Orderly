<?php
session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $description = $_POST['description'];
    $due_date = $_POST['due_date'];


    $errors = array();
    if (empty($description)) {
        $errors[] = "Description is required";
    }
    if (empty($due_date)) {
        $errors[] = "Due date is required";

     } elseif (strtotime($due_date) < strtotime(date('Y-m-d'))) {
        $errors[] = "Due date cannot be prior to the current date";
    }


    if (empty($errors)) {
        require_once 'DAO.php';
        $dao = new DAO();
        $user_id = $_SESSION['user_id'];

        $dao->addChore($user_id,$description,  $due_date);


        header("Location: https://orderly-b0075f006315.herokuapp.com/do.php");
        exit();
    } else {

        $_SESSION['error_messages'] = $errors;
        $_SESSION['inputs']['description'] = $description;
        header("Location:https://orderly-b0075f006315.herokuapp.com/do.php");
        exit();
    }
} else {

    exit();
}
?>
