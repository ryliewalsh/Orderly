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
            echo "join ";
         }
      
         
        ?>
           
    </large-box>

    <div class="vertical">
            <div class="small-box">
                <div class="label-box">Your info</div>
                <div class="content-box">*****</div>
            </div>
            <div class="small-box">
                <div class="label-box">Account</div>
                <a class = "homeButton" href="signOut.php">Sign Out.</a>
                <div class="content-box">Delete account</div>
            </div>
        </div>
</div>
<?php require_once "footer.php"; ?>