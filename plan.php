<?php include_once("header.php");
session_start();
require_once "DAO.php";
$dao = new DAO();
?>

<html>
<head>
    <title>To Plan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="wallpaper">
    <large-box>
        <div class="title">
            <h1>Upcoming Events</h1>

            <table>

                <?php

                $lines = $dao->getEvents();

                if (count($lines) == 0) {
                    echo "<div class='item-box'><div class='item'><span>Nothing going on...</span></div></div>";
                } else {
                    echo "<div class='item-box'>";
                    foreach ($lines as $line) {
                        echo "<div class='item'><span>{$line['event_name']}</span><span>{$line['event_description']}</span>
                        <span>{$line['event_date']}</span>
                        <span>{$line['time']}</span>
                        <button class='trigger-function-button'e_id='{$line['event_id']}'>Response</button></div>";
                    }
                    echo "</div>";
                }
                ?>
            </table>
        </div>
    </large-box>

    <div class="vertical">
        <div class="small-box">
            <div class="label-box">Plans for Today</div>
            <?php
            require_once "DAO.php";
            $dao = new DAO();
            $lines = $dao->getTodaysEvents();
            if (count($lines) == 0) {
                echo "<div class='item-box'><div class='item'><span>Nothing planned.</span></div></div>";


            } else {
                echo "<div class='item-box'>";
                foreach ($lines as $line) {
                    echo "<div class='item'><span>{$line['event_name']}</span><span>{$line['event_description']}</span><span>{$line['event_date']}</span></div>";

                }
                echo "</div>";
            }
            ?>
        </div>

        <div class="small-box">
            <div class="label-box">Plan a Date</div>
            <div class="content-box"> <?php include_once("addEvent.php");?></div>
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
                var event_id = this.getAttribute('e_id');


                var xhr = new XMLHttpRequest();
                xhr.open('POST', 'removeEvent.php', true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status === 200) {

                            var response = xhr.responseText;
                            console.log(response);

                        } else {
                            console.error('Error: ' + xhr.status);
                        }
                    }
                };
                xhr.send('event_id=' + event_id);
            });
        });
    });

</script>


<?php require_once "footer.php"; ?>
