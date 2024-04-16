<?php include_once("header.php"); ?>

    <html>
    <head>
        <title>To Pay</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>

    <div class="wallpaper">
        <large-box>
        <large-box class="title">
            <h1>Budget</h1>
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
                $lines = $dao->getBills();

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
        </large-box>

        <div class="vertical">
            <div class="small-box">
                <div class="label-box">Due Today</div>
                    <div class="content-box">Nothing due today</div>
            </div>

            <div class="small-box">
                <div class="label-box">Add an Expense</div>
                    <div class="content-box"> <?php include_once("addBill.php");?></div>
            </div>
        </div>
    </div>
    </body>
    </html>
<?php require_once "footer.php"; ?>