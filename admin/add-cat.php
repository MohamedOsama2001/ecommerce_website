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
        <title>add-cat</title>
        <link rel="stylesheet" href="../style.css">
    </head>
    <body>
        <?php
        require_once("ahead.php");
        require_once("aslidebar.php");
        ?>
        <div class="acontent">
            <h1>Add New Category</h1>
            <div class="form">
                <form action="../add-catcontroller.php" method="post" enctype="multipart/form-data">
                    Category Name: <input type="text" name="cname"><br><br>
                    Category Image: <input type="file" name="cimage"><br><br>
                    <input type="submit" value="Add">


                </form>
            </div>
        </div>

    </body>
</html>