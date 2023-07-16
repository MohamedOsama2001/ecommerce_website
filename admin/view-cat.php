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
        <title>view-cat</title>
        <link rel="stylesheet" href="../style.css">
    </head>
    <body>
        <?php
        require_once("ahead.php");
        require_once("aslidebar.php");
        ?>
        <div class="acontent">
        <h1>View All Categories</h1>
        <?php
        require_once("../view-catcontroller.php");
        $c=new categories();
        $c->select_data();
        echo $c->print_categories();
        ?>
        </div>
    </body>
</html>