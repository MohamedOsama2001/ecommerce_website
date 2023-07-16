<?php
require_once("../connection.php");
session_start();
$user_id=$_SESSION["user_id"];
if(isset($user_id)!=true)
{
    header("location:../index.php");
}
if(isset($_POST["pro_name"])==true && $_POST["pro_name"]!=0)
{
    $pro_id=$_POST["pro_id"];
    $pro_name=$_POST["pro_name"];
    $pro_image=$_POST["pro_image"];
    $pro_price=$_POST["pro_price"];
    $pro_quantity=$_POST["pro_quantity"];
    $r=$con->query("SELECT*FROM cart WHERE pro_name='$pro_name' AND user_id='$user_id'");
    if($r->num_rows>0)
    {
        $message[]= "already added to cart!";
    }
    else
    {
        $con->query("INSERT INTO cart VALUES(null,'$pro_id','$user_id','$pro_name','$pro_image','$pro_price','$pro_quantity')");
        $message[]= "product added to cart!";
    }
}
?>
<html>
    <head>
        <title>Products</title>
        <link rel="stylesheet" href="../style.css">
    </head>
    <body>
        <?php
        require_once("header.php");
        ?>
        <div class="show">
            <div class="s1">Home/ <mo style="color:gray;">Products</mo></div>
            <?php
            require_once("../view-catcontroller.php");
            $pro=new categories();
            $y="";
            if(isset($_GET["id"])==true)
            {
                $y=$_GET["id"];
            }
            $printpro=$pro->select_products($y);
            echo $printpro->print_array_products();
            ?>

        </div>
        <?php 
        require_once("footer.php");
        ?>
    </body>
</html>