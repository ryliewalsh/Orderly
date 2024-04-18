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

    if ($due_date === false) {

        $errors[] = "Invalid due date format";
    }


    if ($amount === false) {

        $errors[] = "Invalid amount format";
    } elseif ($amount <= 0) {
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

        header("Location:https://orderly-b0075f006315.herokuapp.com/pay.php");
        exit();
    }
} else {

    $_SESSION['error_messages'] = array("Invalid request method");
    header("Location:https://orderly-b0075f006315.herokuapp.com/pay.php");
    exit();
}
?>
