<?php
require_once("../connection.php");
session_start();
$user_id=$_SESSION["user_id"];
if(isset($user_id)!=true)
{
    header("location:../index.php");
}
?>
<html>
    <head>
        <title>Product-details</title>
        <link rel="stylesheet" href="../style.css">
    </head>
    <body>
    <?php
        require_once("header.php");
        ?>
        <div class="show">
            <div class="s1">Home/ <mo style="color:gray;">Product-Details</mo></div>
            <?php
            if(isset($_GET["pid"])==true && $_GET["pid"]!="")
            {
                $r=$con->query("SELECT *FROM products WHERE id=".$_GET["pid"]);
                while($sel=$r->fetch_array(MYSQLI_ASSOC))
                {
                    echo '
                    <form action="products.php" method="post">
                    <div class="pro-detail">
                    <img src="../'.$sel["pro_image"].'">
                    <div class="pro1">'.$sel["full_desc"].'
                    <br><br>Brand: <mo style="color:#0e8ce4;">'.$sel["brand"].'</mo>
                    <br><br>Name: <mo style="color:#0e8ce4;">'.$sel["pro_name"].'</mo>
                    <br><br>Price: <mo style="color:#0e8ce4;">'.$sel["price"].' $</mo>
                    <br><br>Operatig System: <mo style="color: #0e8ce4;">'.$sel["os"].'</mo>
                    <br><br>Quantity: <input type="number" min="1" value="1" name="pro_quantity"><br>
                    <input type="hidden" name="pro_id" value="'.$sel["id"].'">
                    <input type="hidden" name="pro_name" value="'.$sel["pro_name"].'">
                    <input type="hidden" name="pro_image" value="'.$sel["pro_image"].'">
                    <input type="hidden" name="pro_price" value="'.$sel["price"].'">

                    <input type="submit" value="Add To Cart">
                    </div>

                    </div>
                    </form>
                    ';
                }
            }

            ?>

        </div>
        <?php 
        require_once("footer.php");
        ?>
    </body>
</html>