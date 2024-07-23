<?php
session_start();

if (isset($_SESSION['error_messages'])) {
    foreach ($_SESSION['error_messages'] as $error) {
        echo "<div class='message'>$error</div>";
    }
    unset($_SESSION['error_messages']);
}
?>
<div id="text">
    <form method="post" action="event_handler.php">
        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo isset($_SESSION['inputs']['name']) ? htmlspecialchars($_SESSION['inputs']['name']) : ""; ?>">
        </div>
        <div>
            <label for="description">Description:</label>
            <input type="text" id="description" name="description" value="<?php echo isset($_SESSION['inputs']['description']) ? htmlspecialchars($_SESSION['inputs']['description']) : ""; ?>">
        </div>
        <div>
            <label for="due_date">Date:</label>
            <input type="date" id="due_date" name="due_date">
        </div>
        <div>
            <label for="time">Time:</label>
            <input type="time" id="time" name="time">
        </div>


        <input type="submit" value="Submit">
    </form>
</div>
