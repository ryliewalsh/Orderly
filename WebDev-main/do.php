<?php include_once("header.php"); ?>

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
                        <th>Comment</th>
                        <th>Date</th>
                    </tr>
                    </thead>
                    <?php
                    require_once "DAO.php";
                    $dao = new DAO();
                    $lines = $dao->getChores();

                    if (count($lines) == 0) {
                        echo "<tr><td colspan='2'>Congrats, nothing due!</td></tr>";
                    } else {
                        foreach ($lines as $line) {
                            echo "<tr><td>{$line['description']}</td><td>{$line['due_date']}</td></tr>";
                        }
                    }
                    ?>
                </table>
        </large-box>

        <div class="vertical">
            <div class="small-box">
                <div class="label-box">To Do Today</div>
                <div class="content-box">Nothing to do today</div>
            </div>

            <div class="small-box">
                <div class="label-box">Add a Task</div>
                <div class="content-box"> <?php include_once("addChore.php");?></div>
            </div>
        </div>
    </div>
    </body>
<?php require_once "footer.php"; ?>