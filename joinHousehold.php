<?php
session_start();

if (isset($_SESSION['error_messages'])) {
    foreach ($_SESSION['error_messages'] as $error) {
        echo "<div class='message skinny-message'>$error</div>";
    }
    unset($_SESSION['error_messages']);
}
?>
<div id="text">
    <form method="post" action="house_handler.php">
        <div>
            <label for="description">Description:</label>
            <input type="text" id="description" name="description" value="<?php echo isset($_SESSION['inputs']['description']) ? htmlspecialchars( $_SESSION['inputs']['description']) : ""; ?>">
        </div>
        <div>
            <label for="amount">Amount:</label>
            <input type="text" id="amount" name="amount" value="<?php echo isset($_SESSION['inputs']['amount']) ? htmlspecialchars( $_SESSION['inputs']['amount']): ""; ?>">
        </div>
        <div>
            <label for="due_date">Due Date:</label>
            <input type="date" id="due_date" name="due_date">
        </div>


        <input type="submit" value="Submit">
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        setTimeout(function() {
            $(".message").fadeOut();
        }, 1000);
    });
</script>
