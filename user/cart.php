<?php
require_once("../connection.php");
session_start();
$user_id=$_SESSION["user_id"];
if(isset($user_id)!=true)
{
    header("location:../index.php");
}
if(isset($_POST["name"])==true && $_POST["name"]!="")
{
    $name=$_POST["name"];
    $email=$_POST["email"];
    $phone=$_POST["phone"];
    $sad=$_POST["sad"];
    $city=$_POST["city"];
    $country=$_POST["country"];
    $method=$_POST["method"];
    $date= date('d M Y');
    date_default_timezone_set("Africa/Cairo");
    $time=date('h:i A');
    $totalprice=0;
    $cart_products[]='';
    $r=$con->query("SELECT*FROM cart WHERE user_id='$user_id'");
    if($r->num_rows>0)
    {
        while($selectfromcart=$r->fetch_array(MYSQLI_ASSOC))
        {
            $cart_products[]=$selectfromcart['pro_name'].' ('.$selectfromcart['pro_quantity'].') ';
            $priceforone=($selectfromcart["pro_price"]*$selectfromcart["pro_quantity"]);
            $totalprice+=$priceforone;
        }
    }
    $total_products = implode(', ',$cart_products);
    $r=$con->query("SELECT*FROM orders WHERE name='$name' AND phone='$phone' AND email='$email' AND ads='$sad' AND city='$city' AND country='$country' AND method='$method' AND total_products='$total_products' AND total_price='$totalprice'");
    if($totalprice==0)
    {
        $message[]="your cart is empty";
    }
    else
    {
        if($r->num_rows>0)
        {
            $message[]="order already placed!";
        }
        else
        {
            $con->query("INSERT INTO orders VALUES(null,'$user_id','$name','$email','$phone','$sad','$city','$country','$method','$total_products','$totalprice','$date','$time')");
            $message[] = 'order placed successfully!';
            $con->query("DELETE FROM cart WHERE user_id='$user_id'");
        }
    }
    
}
if(isset($_POST["update"]))
{
    $update_id=$_POST["cart_id"];
    $quantity=$_POST["pro_quantity"];
    $con->query("UPDATE cart SET pro_quantity='$quantity' WHERE id='$update_id'");
    $message[]="cart quantity updated!";
}
if(isset($_POST["delete"]))
{
    $delete_id=$_POST["cart_id"];
    $con->query("DELETE FROM cart WHERE user_id='$user_id' AND id='$delete_id'");
    header("location:cart.php");
}
if(isset($_POST["del-all"]))
{
    $con->query("DELETE FROM cart WHERE user_id='$user_id'");
    header("location:cart.php");

}
?>
<html>
    <head>
        <title>Cart</title>
        <link rel="stylesheet" href="../style.css">
    </head>
    <body>
        <?php
        require_once("header.php");
        ?>
        <div class="show">
            <div class="s1">Home/ <mo style="color:gray;">Shopping Cart</mo></div>
            <h1>PRODUCTS ADDED</h1>
            <?php
            $grandtotal=0;
            $r=$con->query("SELECT*FROM cart WHERE user_id='$user_id'");
            if($r->num_rows>0)
            {
                while($cartselect=$r->fetch_array(MYSQLI_ASSOC))
                {
                    $subtotal=$cartselect["pro_quantity"]*$cartselect["pro_price"];
                    echo'
                    <div class="addedbox">
                    <img src="../'.$cartselect["pro_image"].'">
                    <div class="price">'.$cartselect["pro_price"].' $</div>
                    <div class="name">'.$cartselect["pro_name"].'</div>
                    <form action="cart.php" method="post">
                    <input type="hidden" name="cart_id" value="'.$cartselect["id"].'">
                    <input type="number" min="1" name="pro_quantity" value="'.$cartselect["pro_quantity"].'">
                    <input type="submit" value="UPDATE" name="update">';?>
                    <input type="submit" value="DELETE" name="delete" onclick="return confirm('delete this item from cart?');">
                    <?php
                    echo'
                    </form>
                    <div class="subtotal"><mo style="color:#0e8ce4;">Sub Total</mo> : '.$subtotal.' $ </div>
                    </div>
                    ';
                    $grandtotal+=$subtotal;
                }
                echo '
                <form action="cart.php" method="post">';?>
                <div class="del-all"><input type="submit" value="Delete All" name="del-all" onclick="return confirm('delete all items from cart?');"></div>
                <?php
                echo'
                <div class="grand"><h2>Grand Total :'.$grandtotal.' $ </h2>
                <a href="products.php"><div class="conshop">Continue Shopping</div></a>
                <a href="checkout.php"><div class="checkout">Proceed To Checkout </div></a>
                </div>
                </form>
                ';
            }
            else
            {
                echo"<div class='empty'>Your Cart Is Empty!</div>
                <a href='products.php'><div class='continue'>Continue Shopping</div></a>
                
                "; 
            }

            ?>

        </div>
        <?php 
        require_once("footer.php");
        ?>
    </body>
</html>