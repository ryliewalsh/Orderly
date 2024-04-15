<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $description = $_POST['description'];
    $due_date = $_POST['due_date'];
    $amount = $_POST['amount'];
    $is_recurring = $_POST['is_recurring'];
    $is_paid = $_POST['is_paid'];

    // Validate form data (you can add more validation if needed)
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

    // If there are no validation errors, proceed to process the data
    if (empty($errors)) {
        // Process the data (e.g., save to database, send email, etc.)
        // For example, you can save the data to a database using your Dao class
        require_once 'Dao.php';
        $dao = new Dao();
        $dao->addBill($description, $amount, $due_date, $is_recurring);

        // Optionally, you can redirect the user to another page after processing

        exit();
    } else {
        // If there are validation errors, you can handle them here (e.g., display error messages)
        // For example, you can redirect the user back to the form page with error messages
        // You can store the error messages in session or pass them as URL parameters
        // Redirect to the form page
        header("Location: form.php?errors=" . urlencode(implode(",", $errors)));
        exit();
    }
} else {
    // If the form is not submitted via POST method, redirect to an error page or display an error message

    exit();
}
?>
