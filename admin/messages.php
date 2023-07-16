<?php
require_once("../connection.php");
session_start();
$admin_id=$_SESSION["admin_id"];
if(isset($admin_id)!=true)
{
    header("location:../index.php");
}
if(isset($_POST["delete"])==true)
{
    $message_id=$_POST["message_id"];
    $con->query("DELETE FROM message WHERE id='$message_id'");
    header("location:messages.php");
}
?>
<html>
    <head>
        <title>messages</title>
        <link rel="stylesheet" href="../style.css">
    </head>
    <body>
        <?php
        require_once("ahead.php");
        require_once("aslidebar.php");
        ?>
        <div class="acontent">
        <h1>Messages</h1>
        <?php
        $r=$con->query("SELECT*FROM message  ORDER BY id DESC");
        if($r->num_rows>0)
        {
        while($sel=$r->fetch_array(MYSQLI_ASSOC))
        {
            echo"
            <div class='messages'>
            user-id : ".$sel["user_id"]."<br>
            name : ".$sel["name"]."<br> 
            email : ".$sel["email"]."<br>
            subject : ".$sel["subject"]."<br>
            message : ".$sel["msg"]."<br>
            <form action='messages.php' method='post'> 
            <input type='hidden' name='message_id' value='".$sel["id"]."'>
            <input type='submit' value='Delete' name='delete'>
            </form>
            </div>
            ";
        }
        }
        else
        {
            echo"<div class='noorder'>You Have No Messages!</div>";
        }

        ?>
        </div> 


    </body>
</html>