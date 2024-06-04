<?php

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



        exit();
    } else {

        header("Location: form.php?errors=" . urlencode(implode(",", $errors)));
        exit();
    }
} else {


    exit();
}
?>
