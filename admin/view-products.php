<?php
session_start();
$admin_id=$_SESSION["admin_id"];
if(isset($admin_id)!=true)
{
    header("location:../index.php");
}
?>
<html>
    <head>
        <title>view-products</title>
        <link rel="stylesheet" href="../style.css">
    </head>
    <body>
        <?php
        require_once("ahead.php");
        require_once("aslidebar.php");
        ?>
        <div class="acontent">
        <h1>View Products</h1>
        <?php
        require_once("../view-catcontroller.php");
        $p=new categories();
        $y="";
        if(isset($_GET["id"])==true)
        {
            $y=$_GET["id"];
        }
        $printp=$p->select_products($y);
        echo $printp->print_array_products();

        ?>
        </div>
    </body>
</html>