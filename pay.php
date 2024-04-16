<?php include_once("header.php"); ?>

    <html>
    <head>
        <title>To Pay</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>

    <div class="wallpaper">
        <large-box class="title">
            <h1>Budget</h1>

            <div class="content-box">Congrats nothing due!</div>

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