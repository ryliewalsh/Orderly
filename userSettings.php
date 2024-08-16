<?php include_once("header.php");
session_start();
require_once "DAO.php";
$dao = new DAO();

?>
    <html>
    <head>
        <title>Account Settings</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>

<div class="wallpaper">
    <large-box>
        <div class="title">
            <h1>Your Household</h1>
        </div>
        <?php 
         if (isset($_SESSION['house_id'])){

            echo "here";

         }
         else{
          include_once("joinHousehold.php");
         }
      
        ?>
           
    </large-box>

    <div class="vertical">
            <div class="small-box">
                <div class="label-box">Your Info</div>
                <div class="content-box">
                 ***This Feature is Coming Soon***
                </div>
            </div>
            <div class="small-box">
                <div class="label-box">Account</div>
                <a class = "homeButton" href="signOut.php">Sign Out.</a>
                
            </div>
        </div>
</div>
<?php require_once "footer.php"; ?>