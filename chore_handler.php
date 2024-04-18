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

        if (isset($_SESSION['messages'])) {
            foreach ($_SESSION['messages'] as $errors) {
                echo "<div class='message '>{$errors}</div>";
            }
            unset($_SESSION['messages']);
        }
        exit();
    }
} else {


    exit();
}
?>
