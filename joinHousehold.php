<?php include_once("header.php"); ?>

<html>
<head>
    <title>Welcome!</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="wallpaper">
    <large-box>
        <large-box class="title">
            <h1>Welcome!</h1>
            <div class = 'houseKey'> Join a house/get new key
                <form action="houseHandler.php" method="post">
                    <div>
                        <label for="houseName">Household Name:</label>
                        <input type="text" id="houseName" name="houseName" >
                    </div>
                    <div>
                        <label for="houseKey">Household Key:</label>
                        <input type="text" id="houseKey" name="houseKey" >
                    </div>
                    <div>
                        <button type="submit" name="action" value="join">Join Existing Household</button>
                        <button type="submit" name="action" value="create">Create New Household</button>
                    </div>
                </form>
            </div>
        </large-box>
    </large-box>


</div>
</body>
</html>
<?php require_once "footer.php"; ?>
