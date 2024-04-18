<?php include_once("header.php");


?>

    <html>
    <head>
        <title>To Do</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>

    <div class="wallpaper">
        <large-box>
                <h1>Agenda</h1>

                <table>
                    <thead>
                    <tr>
                        <th>Task</th>
                        <th>Do By</th>
                    </tr>
                    </thead>
                    <?php
                    require_once "DAO.php";
                    $dao = new DAO();
                    $lines = $dao->getChores();

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
                </table>
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
<?php require_once "footer.php"; ?>