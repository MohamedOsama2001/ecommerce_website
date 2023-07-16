<?php
session_start();
$user_id=$_SESSION["user_id"];
if(isset($user_id)!=true)
{
    header("location:../index.php");
}
?>
<html>
    <head>
        <title>Home</title>
        <link rel="stylesheet" href="../style.css">
        <script>
            i=0;
            sliderimage["../image/phone.jpg","../image/pexels-photo-removebg.png"];
            function slider()
            {
                document.getELementById("img").src="../image/pexels-photo-removebg.png";
            }

        </script>
    </head>
    <body>
        <?php
        require_once("header.php");
        ?>
        <div class="H">
            <div class="h1">
                <h1>NEW AREA OF LAPTOPS <br> AND SMARTPHONES</h1>
                <a href="products.php" style="text-decoration:none;"><div class="h2">Shop Now</div></a>
                
            </div>
            <div class="h3" onclick="slider();">
                <img id="img" src="../image/phone.jpg" width="95%" height="80%" >
            </div>
        </div>
        <?php 
        require_once("footer.php");
        ?>
    </body>
</html>