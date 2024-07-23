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
                $events = $dao->getTodaysEvents();

                if (empty($chores) && empty($bills) && empty($events)) {
                    echo "Congrats nothing to do!";
                } else {
                    foreach ($chores as $chore) {
                        echo "<div class='item-box'><a href='do.php' class='small-item chore'>Chore</a><div>{$chore['description']}</div></div>";
                    }
                    foreach ($bills as $bill) {
                        echo "<div class='item-box'><a href = 'pay.php' class ='small-item bill'>Bill</a><div>{$bill['description']}</div></div>";
                    }
                    foreach ($events as $event) {
                        echo "<div class='item-box'><a href = 'plan.php' class ='small-item event'>Event</a><div>{$event['description']}</div></div>";
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
                $upcomingEvents= $dao->getEvents();

                if (empty($upcomingChores) && empty($upcomingBills)) {
                    echo "All caught up!";
                } else {
                    foreach ($upcomingChores as $chore) {
                        echo "<div class='item-box'><a href='do.php' class='small-item chore'>Chore</a><div>{$chore['description']}</div></div>";
                    }
                    foreach ($upcomingBills as $bill) {
                        echo "<div class='item-box'><a href = 'pay.php' class ='small-item bill'>Bill</a><div>{$bill['description']}</div></div>";
                    }
                    foreach ($upcomingEvents as $event) {
                        echo "<div class='item-box'><a href = 'plan.php' class ='small-item event'>Event</a><div>{$event['description']}</div></div>";
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>
</body>
<?php require_once "footer.php"; ?>
