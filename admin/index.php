<?php
require_once("../connection.php");
session_start();
$admin_id=$_SESSION["admin_id"];
if(isset($admin_id)!=true)
{
    header("location:../index.php");
}
?>
<html>
    <head>
        <title>Dashboard</title>
        <link rel="stylesheet" href="../style.css">
    </head>
    <body>
        <?php
        require_once("ahead.php");
        require_once("aslidebar.php");
        ?>
        <div class="acontent">
            <h1>DASHBOARD</h1>
            <div class="dashbox">
                <?php
                $totalmoney=0;
                $r=$con->query("SELECT*FROM orders");
                if($r->num_rows>0)
                {
                    while($sel=$r->fetch_array(MYSQLI_ASSOC))
                    {
                        $pfoo=$sel["total_price"];
                        $totalmoney+=$pfoo;
                    }
                    
                }
                ?>
                <h3><?php echo $totalmoney;?> $</h3>
                <b>Total Money From Orders</b>
            </div>
            <div class="dashbox">
                <?php
                $r1=$con->query("SELECT*FROM orders");
                $num_of_orders=$r1->num_rows;
                ?>
                <h3><?php echo $num_of_orders;?></h3>
                <b>Order Placed</b>
            </div>
            <div class="dashbox">
                <?php
                $r2=$con->query("SELECT*FROM categories");
                $num_of_categories=$r2->num_rows;
                ?>
                <h3><?php echo $num_of_categories;?></h3>
                <b>Categories Added</b>
            </div>
            <div class="dashbox">
                <?php
                $r3=$con->query("SELECT*FROM products");
                $num_of_products=$r3->num_rows;
                ?>
                <h3><?php echo $num_of_products;?></h3>
                <b>Products Added</b>
            </div>
            <div class="dashbox">
                <?php
                $r4=$con->query("SELECT*FROM users WHERE user_type='admin'");
                $admin=$r4->num_rows;
                ?>
                <h3><?php echo $admin;?></h3>
                <b>Admin Users</b>
            </div>
            <div class="dashbox">
                <?php
                $r5=$con->query("SELECT*FROM users WHERE user_type='user'");
                $user=$r5->num_rows;
                ?>
                <h3><?php echo $user;?></h3>
                <b>Normal User</b>
            </div>
            <div class="dashbox">
                <?php
                $r6=$con->query("SELECT*FROM users");
                $total=$r6->num_rows;
                ?>
                <h3><?php echo $total;?></h3>
                <b>Total Accounts</b>
            </div>
            <div class="dashbox">
                <?php
                $r7=$con->query("SELECT*FROM message");
                $msg=$r7->num_rows;
                ?>
                <h3><?php echo $msg;?></h3>
                <b>Messages</b>
            </div>
        </div>

    </body>
</html>