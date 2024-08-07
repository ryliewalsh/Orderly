<?php include_once("header.php"); ?>
    <html>
    <head>
        <title>Account Settings</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>

    <div class="wallpaper">
        <div class="title">
            <h1>Your Household</h1>
             <table>

                <?php

                $lines = $dao->getBills();

                if (count($lines) == 0) {
                    echo "<div class='item-box'><div class='item'><span>Congrats, nothing due!</span></div></div>";
                } else {
                    echo "<div class='item-box'>";
                    foreach ($lines as $line) {
                        echo "<div class='item'><span>{$line['description']}</span>
                               <span>{$line['amount']}</span><span>{$line['due_date']}</span>
                               
                               <button class='trigger-function-button' b_id='{$line['bill_id']}'>Mark as Paid</button></div>";
                    }
                    echo "</div>";
                }
                ?>
            </table>
            
            </div>
        <div class="vertical">
            <div class="small-box">
                <div class="label-box">Your info</div>
                <div class="content-box">*****</div>
            </div>
            <div class="small-box">
                <div class="label-box">Account</div>
                <a class = "homeButton" href="signOut.php">Sign Out.</a>
                <div class="content-box">Delete account</div>
            </div>
        </div>
    </div>
    </body>
<?php require_once "footer.php"; ?>