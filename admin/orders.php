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
    $order_id=$_POST["order_id"];
    $con->query("DELETE FROM orders WHERE id='$order_id'");
    header("location:orders.php");
}
?>
<html>
    <head>
        <title>add-cat.php</title>
        <link rel="stylesheet" href="../style.css">
    </head>
    <body>
        <?php
        require_once("ahead.php");
        require_once("aslidebar.php");
        ?>
        <div class="acontent">
        <h1>Orderds</h1>
        <?php
        $r=$con->query("SELECT*FROM orders ORDER BY id DESC");
        if($r->num_rows>0)
        {
        while($sel=$r->fetch_array(MYSQLI_ASSOC))
        {
            echo"
            <div class='order'>
            user-id : ".$sel["user_id"]."<br>
            placed on : ".$sel["date"]."<br>
            time : ".$sel["time"]."<br>
            name : ".$sel["name"]."<br> 
            email : ".$sel["email"]."<br>
            phone : ".$sel["phone"]."<br>
            address : ".$sel["ads"]." /".$sel["city"]." /".$sel["country"]."<br>
            total products : ".$sel["total_products"]."<br>
            total price : ".$sel["total_price"]."<br>
            payment method : ".$sel["method"]."<br>
            <form action='orders.php' method='post'> 
            <input type='hidden' name='order_id' value='".$sel["id"]."'>
            <input type='submit' value='Delete' name='delete'>
            </form>
            </div>
            ";
        }
        }
        else
        {
            echo"<div class='noorder'>No Orders Placed Yet!</div>";
        }

        ?>
        </div> 


    </body>
</html>