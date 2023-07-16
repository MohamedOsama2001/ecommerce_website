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
        <title>product-details</title>
        <link rel="stylesheet" href="../style.css">
    </head>
    <body>
        <?php
        require_once("ahead.php");
        require_once("aslidebar.php");
        ?>
        <div class="acontent">
        <h1>Product Details</h1>
        <?php
            $x="";
            if(isset($_GET["pid"])==true && $_GET["pid"]!="")
            {
                $x="WHERE id=".$_GET["pid"];
            }
            $r=$con->query("SELECT *FROM products $x");
            while($sel=$r->fetch_array(MYSQLI_ASSOC))
            {
                echo '
                <div class="pro-detail">
                <img src="../'.$sel["pro_image"].'">
                <div class="pro1">'.$sel["full_desc"].'
                    <br><br>Brand: <mo style="color:#0e8ce4;">'.$sel["brand"].'</mo>
                    <br><br>Name: <mo style="color:#0e8ce4;">'.$sel["pro_name"].'</mo>
                    <br><br>Price: <mo style="color:#0e8ce4;">'.$sel["price"].' $</mo>
                    <br><br>OS: <mo style="color:#0e8ce4;">'.$sel["os"].'</mo>
                </div>

                </div>
                ';
            }

            ?>

        </div>
    </body>
</html>