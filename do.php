<?php include_once("header.php"); ?>

<html>
<head>
    <title>To Pay</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="wallpaper">
    <large-box>
        <div class="title">
            <h1>Agenda</h1>
            <table>

                <?php
                require_once "DAO.php";
                $dao = new DAO();
                $lines = $dao->getChores();

                if (count($lines) == 0) {
                    echo "<div class='item-box'><div class='item'><span>Congrats, nothing to do!</span></div></div>";
                } else {
                    echo "<div class='item-box'>";
                    foreach ($lines as $line) {
                        echo "<div class='item'><span>{$line['description']}</span><span>{$line['due_date']}</span>
                        <button class='trigger-function-button' c_id='{$line['chore_id']}'>Mark as Done</button></div>";
                    }
                    echo "</div>";
                }
                ?>
            </table>
        </div>
    </large-box>

    <div class="vertical">
        <div class="small-box">
            <div class="label-box">To Do Today</div>
            <?php
            require_once "DAO.php";
            $dao = new DAO();
            $lines = $dao->getTodaysChores();
            if (count($lines) == 0) {
                echo "<div class='item-box'><div class='item'><span>Congrats, nothing due!</span></div></div>";
            } else {
                echo "<div class='item-box'>";
                foreach ($lines as $line) {
                    echo "<div class='item'><span>{$line['description']}</span><span>{$line['due_date']}</span></div>";
                }
                echo "</div>";
            }
            ?>
        </div>

        <div class="small-box">
            <div class="label-box">Add a Task</div>
            <div class="content-box"> <?php include_once("addChore.php");?></div>
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
                var chore_id = this.getAttribute('c_id');


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
                xhr.send('chore_id=' + chore_id);
            });
        });
    });

</script>

<?php require_once "footer.php"; ?>
