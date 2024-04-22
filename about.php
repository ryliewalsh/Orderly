<div class="header">
    <a class="logo" href="index.php">Orderly.</a>
    <a class="overview <?php echo ($_SERVER['SCRIPT_NAME'] == '/index.php') ? 'active' : ''; ?>" href="index.php">Overview</a>
    <a class="pay <?php echo ($_SERVER['SCRIPT_NAME'] == '/pay.php') ? 'active' : ''; ?>" href="pay.php">Pay</a>
    <a class="plan <?php echo ($_SERVER['SCRIPT_NAME'] == '/plan.php') ? 'active' : ''; ?>" href="plan.php">Plan</a>
    <a class="do <?php echo ($_SERVER['SCRIPT_NAME'] == '/do.php') ? 'active' : ''; ?>" href="do.php">Do</a>
    <a class="about <?php echo ($_SERVER['SCRIPT_NAME'] == '/about.php') ? 'active' : ''; ?>" href="about.php">About</a>
    <div class="header-right">
        <a class="user" href="signUp.php">Account Settings</a>
    </div>
</div>

        <html>
    <head>
        <title>About</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>

    <div class="wallpaper">
        <large-box>
            <h1>Our Mission</h1>
            <div class = "content-box">
            <p>Orderly is dedicated to fostering harmony within households by providing a seamless platform for
                organizing tasks, bills, and schedules. Our mission is to empower members to effortlessly track
                and manage chores, bills, and important dates for each household member. By promoting transparency
                and accountability, Orderly aims to streamline household management, reduce stress, and cultivate a
                more harmonious living environment for all.</p>
            </div>
        </large-box>
        <div class="vertical">
            <div class="small-box">
                <div class="label-box">About Us</div>
                <div class="content-box">
                    <p>Orderly was created in 2024 by an extremely disorderly person. The creator struggles with
                        crippling ADHD.
                   </p>
                </div>
            </div>
            <div class="small-box">
                <div class="label-box">Helpful Links</div>
                <div class="content-box">
                    <a class="links" href="https://www.nimh.nih.gov/health/publications/adhd-what-you-need-to-know">ADHD Facts</a>
                </div>
            </div>
        </div>
    </div>
    </body>
<?php require_once "footer.php"; ?>