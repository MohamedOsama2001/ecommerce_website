<?php
require_once("../connection.php");
session_start();
?>
<html>
    <head>
        <title>Users</title>
        <link rel="stylesheet" href="../style.css">
    </head>
    <body>
        <?php
        require_once("ahead.php");
        require_once("aslidebar.php");
        ?>
        <div class="acontent">
        <h1>Users</h1>
        <?php
        $r=$con->query("SELECT*FROM users ORDER BY id DESC");
        while($sel=$r->fetch_array(MYSQLI_ASSOC))
        {
            echo"
            <div class='allusers'>
            user-id : ".$sel["id"]."<br>
            username : ".$sel["name"]."<br> 
            email : ".$sel["email"]."<br>
            user type : ".$sel["user_type"]."<br>
            </div>
            ";
        }

        ?>
        </div> 


    </body>
</html>