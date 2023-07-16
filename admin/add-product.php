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
        <title>add-product</title>
        <link rel="stylesheet" href="../style.css">
    </head>
    <body>
        <?php
        require_once("ahead.php");
        require_once("aslidebar.php");
        ?>
        <div class="acontent">
        <h1>Add New Product</h1>
        <div class="form">
        <form action="../add-procontroller.php" method="post" enctype="multipart/form-data">
            Category Name: <?php
            $r=$con->query("SELECT*FROM categories");
            echo"<select name='cat_id' class='select'>";
            while($row=$r->fetch_array(MYSQLI_ASSOC))
            {
                echo"<option value='".$row["id"]."'>".$row["cname"]."</option>";
            }
            echo"</select>";
            ?><br><br>
            Product Name: <input type="text" name="pro_name"><br><br>
            Product Image: <input type="file" name="pro_image"><br><br>
            Price: <input type="text" name="price"><br><br>
            Brand Name: <input type="text" name="brand"><br><br>
            Operating System: <input type="text" name="os"><br><br>
            Full Description: <input type="text" name="full_desc"><br><br>
            <input type="submit" value="Add">


        </form>
        </div>

        </div>
    </body>
</html>