<?php require_once("header.php"); ?>
<html>
<head>
    <title>Home Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="wallpaper">
    <large-box >
        <?php include_once("calendar.php"); ?>
    </large-box>
    <div class="vertical">
        <div class="small-box">
            <div class="label-box">Today's Items</div>
            <div class="content-box">Congrats nothing to do!</div>
        </div>
        <div class="small-box">
            <div class="label-box">Upcoming</div>
            <div class="content-box">All caught up!</div>
        </div>
    </div>
</div>
</body>
<?php require_once "footer.php"; ?>
