<html>
    <head>
        <title>ahead</title>
        <link rel="stylesheet" href="../style.css">
    </head>
    <body>
        <div class="ahead">
            <div class="ahlogo">
                <img src="../image\icons8-admin-panel-66.png" width="50px" height="25px">
                <div class="text">Admin Control Panel</div>
                
            </div>
            <div class="ahmenu">
                <div class="ahmenuright">
                <img src="../image\icons8-administrator-male-16.png" width="50px" height="25px">
                <div class="aname"><?php echo $_SESSION["admin_name"];?></div>
                <a href="../logout.php"><div class="alogout">Logout</div></a>
                </div>
                </div>
            </div>
        </div>
    </body>
</html>