<?php
session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $due_date = $_POST['due_date'];
    $time = $_POST['time'];


    $errors = array();
    if (empty($description)) {
        $errors[] = "Description is required";
    }
    if (empty($due_date)) {
        $errors[] = "Due date is required";

    } elseif (strtotime($due_date) < strtotime(date('Y-m-d'))) {
        $errors[] = "Due date cannot be prior to the current date";
    }
    if (empty($time)) {
        $errors[] = "Time is required";
    }


    if (empty($errors)) {
        require_once 'DAO.php';
        $dao = new DAO();
        $user_id = $_SESSION['user_id'];

        $dao->addEvent($user_id,$name, $description,  $due_date, $time);


        header("Location: https://orderly-b0075f006315.herokuapp.com/plan.php");
        exit();
    } else {

        $_SESSION['error_messages'] = $errors;
        $_SESSION['inputs']['name'] = $name;
        $_SESSION['inputs']['description'] = $description;
        header("Location:https://orderly-b0075f006315.herokuapp.com/plan.php");
        exit();
    }
} else {

    header("Location:https://orderly-b0075f006315.herokuapp.com/plan.php");
    exit();
}
?>