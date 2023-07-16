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
        <title>Search</title>
        <link rel="stylesheet" href="../style.css">
    </head>
    <body>
    <?php
        require_once("header.php");
        ?>
        <div class="show">
            <div class="s1">Home/ <mo style="color:gray;">Search</mo></div>
            <?php
            if(isset($_GET["search"])==true && $_GET["search"]!="")
            {
                $s=$_GET["search"];
                $r=$con->query("SELECT*FROM products WHERE pro_name LIKE '%$s%'");
                if($r->num_rows>0)
                {
                while($sel=$r->fetch_array(MYSQLI_ASSOC))
                {
                    echo"
                    <a href=product-detail.php?pid=".$sel["id"].">
                    <div class='spro'>
                    <img src='../".$sel["pro_image"]."'>
                    <div class='price'>".$sel["price"]." $</div>
                    <div class='name'>".$sel["pro_name"]."</div>
                    </div>
                    </a>
                    ";
                }
            }
            else
            {
                echo "<div class='not'>Not Found!</div>";
            }
            }
            else
            {
                echo "<div class='not'>Not Found!</div>";
            }

            ?>

        </div>
        <?php 
        require_once("footer.php");
        ?>
    </body>
</html>