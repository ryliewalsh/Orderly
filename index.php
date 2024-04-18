<?php require_once("header.php"); ?>
<html>
<head>
    <title>Home Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="wallpaper">
    <large-box>
        <?php include_once("calendar.php"); ?>
    </large-box>
    <div class="vertical">
        <div class="small-box">
            <div class="label-box">Today's Items</div>
            <div class="content-box">
                <?php
                require_once "DAO.php";
                $dao = new DAO();
                $chores = $dao->getTodaysChores();
                $bills = $dao->getTodaysBills();

                if (empty($chores) && empty($bills)) {
                    echo "Congrats nothing to do!";
                } else {
                    foreach ($chores as $chore) {
                        echo "<div class='item-box'><a href='do.php' class='small-item chore'>Chore</a><div>{$chore['description']}</div></div>";
                    }
                    foreach ($bills as $bill) {
                        echo "<div class='item-box'><div class='small-item bill'></div><div>{$bill['description']}</div></div>";
                    }
                }
                ?>
            </div>
        </div>
        <div class="small-box">
            <div class="label-box">Upcoming</div>
            <div class="content-box">
                <?php
                $upcomingChores = $dao->getChores();
                $upcomingBills = $dao->getBills();

                if (empty($upcomingChores) && empty($upcomingBills)) {
                    echo "All caught up!";
                } else {
                    foreach ($upcomingChores as $chore) {
                        echo "<div class='item-box'><div class='small-item'></div><div>{$chore['description']}</div></div>";
                    }
                    foreach ($upcomingBills as $bill) {
                        echo "<div class='item-box'><div class='small-item'></div><div>{$bill['description']}</div></div>";
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>
</body>
<?php require_once "footer.php"; ?>
