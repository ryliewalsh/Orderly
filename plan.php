<?php include_once("header.php");
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

<!--            <table>-->
<!---->
<!--                --><?php
//
//                $lines = $dao->getEvents();
//
//                if (count($lines) == 0) {
//                    echo "<div class='item-box'><div class='item'><span>Congrats, nothing due!</span></div></div>";
//                } else {
//                    echo "<div class='item-box'>";
//                    foreach ($lines as $line) {
//                        echo "<div class='item'><span>{$line['description']}</span><span>{$line['amount']}</span><span>{$line['due_date']}</span></div>";
//                    }
//                    echo "</div>";
//                }
//                ?>
<!--            </table>-->
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
                    echo "<div class='item'><span>{$line['name']}</span><span>{$line['description']}</span><span>{$line['due_date']}</span></div>";
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

<?php require_once "footer.php"; ?>
