<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $description = $_POST['description'];
    $due_date = $_POST['due_date'];
    $amount = $_POST['amount'];
    $is_recurring = $_POST['is_recurring'];



    $errors = array();
    if (empty($description)) {
        $errors[] = "Description is required";
    }
    if (empty($due_date)) {
        $errors[] = "Due date is required";
    }
    if ($amount <= 0) {
        $errors[] = "Price must be greater than 0";
    }


    if (empty($errors)) {

        require_once 'DAO.php';
        $dao = new DAO();
        $dao->addBill($description, $amount, $due_date, $is_recurring);


        header("Location: https://orderly-b0075f006315.herokuapp.com/pay.php");
        exit();
    } else {

        header("Location: form.php?errors=" . urlencode(implode(",", $errors)));
        exit();
    }
} else {


    exit();
}
?>
