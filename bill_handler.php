<?php
session_start();


$errors = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $description = $_POST['description'];
    $due_date = $_POST['due_date'];
    $amount = $_POST['amount'];

    if (empty($description)) {

        $errors[] = "Description is required";
    }

    if (empty($due_date)) {
        $errors[] = "Due date is required";

    } elseif (strtotime($due_date) < strtotime(date('Y-m-d'))) {
        $errors[] = "Due date cannot be prior to the current date";
    }


    if (empty($amount)) {
        $errors[] = "Amount is required";
    }
    if ($amount <= 0) {
        $errors[] = "Amount must be a positive number";
    }



    if (empty($errors)) {
        require_once 'DAO.php';
        $dao = new DAO();
        $user_id = $_SESSION['user_id'];

        $dao->addBill($user_id,$description, $amount,  $due_date);


        header("Location: https://orderly-b0075f006315.herokuapp.com/pay.php");
        exit();
    } else {

        $_SESSION['error_messages'] = $errors;
        $_SESSION['inputs']['description'] = $description;
        $_SESSION['inputs']['amount'] = $amount;
        $_SESSION['inputs']['due_date'] = $due_date;

        header("Location:https://orderly-b0075f006315.herokuapp.com/pay.php");
        exit();
    }
} else {


    $_SESSION['error_messages'] = array("Invalid request method");
    header("Location:https://orderly-b0075f006315.herokuapp.com/pay.php");
    exit();
}
?>
