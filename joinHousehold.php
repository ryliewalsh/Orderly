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
<form action="houseHandler.php" method="post">
                    <div>
                        <label for="houseName">Household Name:</label>
                        <input type="text" id="houseName" name="houseName" >
                    </div>
                    <div>
                        <label for="houseKey">Household Key:</label>
                        <input type="text" id="houseKey" name="houseKey" >
                    </div>
                    <div>
                        <button type="submit" name="action" value="join">Join Existing Household</button>
                        <button type="submit" name="action" value="create">Create New Household</button>
                    </div>
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
