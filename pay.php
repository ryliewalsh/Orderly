<?php include_once("header.php");
session_start();
require_once "DAO.php";
$dao = new DAO();
?>

<html>
<head>
    <title>To Pay</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="wallpaper">
    <large-box>
        <div class="title">
            <h1>Budget</h1>

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
                               <button class='trigger-function-button' id='{$line['bill_id']}'>Trigger Function</button></div>";
                    }
                    echo "</div>";
                }
                ?>
            </table>
        </div>
    </large-box>

    <div class="vertical">
        <div class="small-box">
            <div class="label-box">Due Today</div>
            <?php
            require_once "DAO.php";
            $dao = new DAO();
            $lines = $dao->getTodaysBills();
            if (count($lines) == 0) {
                echo "<div class='item-box'><div class='item'><span>Caught up for the day!</span></div></div>";
            } else {
                echo "<div class='item-box'>";
                foreach ($lines as $line) {
                    echo "<div class='item'><span>{$line['description']}</span><span>{$line['amount']}</span><span>{$line['due_date']}</span><button class='trigger-function-button'>Trigger Function</button></div>";
                }
                echo "</div>";
            }
            ?>
        </div>

        <div class="small-box">
            <div class="label-box">Add an Expense</div>
            <div class="content-box"> <?php include_once("addBill.php");?></div>
        </div>
    </div>
</div>
</body>
</html>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var buttons = document.querySelectorAll('.trigger-function-button');

        buttons.forEach(function(button) {
            button.addEventListener('click', function(event) {
                var billId = this.getAttribute('id');


                var xhr = new XMLHttpRequest();


                xhr.open('POST', 'payBill.php', true);


                xhr.setRequestHeader('Content-Type', 'application/json');


                xhr.onload = function() {

                    if (xhr.status >= 200 && xhr.status < 300) {

                        var response = JSON.parse(xhr.responseText);

                    } else {

                        console.error('HTTP error:', xhr.status, xhr.statusText);
                    }
                };

                xhr.onerror = function() {
                    console.error('Network error');
                };

                xhr.send(JSON.stringify({ billId: billId }));
            });
        });
    });

</script>
<?php require_once "footer.php"; ?>
