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
                    <?php $info = $dao->getUser();
                  
                        if (count($info) == 0) {
                            echo "<div class='item-box'><div class='item'><span>Congrats, nothing due!</span></div></div>";
                        } else {
                            echo "<div class='item-box'>";
                                echo "<div class='item'><span>{$info['first_name']}</span>
                                    <span>{$info['last_name']}</span><span>{$info['username']}</span>";
                            
                            echo "</div>";
                        }
                    
                ?>
                </div>
            </div>
            <div class="small-box">
                <div class="label-box">Account</div>
                <a class = "homeButton" href="signOut.php">Sign Out.</a>
                <div class="content-box">Delete account</div>
            </div>
        </div>
</div>
<?php require_once "footer.php"; ?>