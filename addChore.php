<?php
session_start();

// Check if there are error messages stored in the session
if (isset($_SESSION['error_messages'])) {
    // Iterate through each error message and display them within table rows
    foreach ($_SESSION['error_messages'] as $error) {
        echo "<tr><td>{$error}</td></tr>";
    }
    // Unset the error messages after displaying them
    unset($_SESSION['error_messages']);
}
?>
<div id="text">
    <form method="post" action="chore_handler.php">
        <div>
            <label for="description">Description:</label>
            <input type="text" id="description" name="description">
        </div>
        <div>
            <label for="due_date">Due Date:</label>
            <input type="date" id="due_date" name="due_date">
        </div>
        <div>
            <label for="is_recurring">Recurring:</label>
            <input type="checkbox" id="is_recurring" name="is_recurring" value="1">
        </div>

        <input type="submit" value="Submit">
    </form>
</div>
