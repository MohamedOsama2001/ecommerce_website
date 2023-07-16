<html>
    <head>
        <title>head</title>
        <link rel="stylesheet" href="../style.css">
        <script>
            function fun()
            {
                document.getElementById("all").style.display="block";
            }
            function fun2()
            {
                document.getElementById("all").style.display="none";
            }
            function udetail()
            {
                document.getElementById("uinfo").style.display="block";

            }
            function udetail1()
            {
                document.getElementById("uinfo").style.display="none";

            }
            function shutdown()
            {
                document.getElementById("mbox").style.display="none";

            }
        </script>
    </head>
    <body>
    <?php
        if(isset($message)){
           foreach($message as $message){
              echo '
              <div class="message" id="mbox">
                 '.$message.'
                 <input type="button" value="X" onclick="shutdown()">
              </div>
              ';
           }
        }
        ?>
        <div class="uheader">
            <div class="header1">
                <div class="name"><a href="home.php">MR.X Store</a></div>
                <form action="search.php" method="get">
                <div class="search">
                    <input type="text" name="search" placeholder="Search of product">
                    
                </div>
                <div class="option"> 
                    <div class="signin" onmouseleave="udetail1()">
                        <img src="https://preview.colorlib.com/theme/onetech/images/user.svg" width="40px" height="40px" onmouseover="udetail()">
                        <div class="uinfo" id="uinfo">
                            Username : <mo style="color: #0e8ce4;"><?php echo $_SESSION["user_name"];?></mo><br><br>
                            email : <mo style="color: #0e8ce4;"><?php echo $_SESSION["user_email"];?></mo><br>
                            <a href="../logout.php"><div class="logout">Logout</div></a>
                        </div>
                        <div class="s">new <a href="../index.php">login</a> | <a href="../register.php">register</a></div>
                    </div>
                    <a href="cart.php"><div class="cart">
                        <img src="../image\icons8-trolley-64.png" width="40px" height="40px">
                        <div class="s">
                            <?php
                            require_once("../connection.php");
                            $tpc=0;
                            $r=$con->query("SELECT pro_quantity FROM cart WHERE user_id='$user_id'");
                            if($r->num_rows>0)
                            {
                                while($sel=$r->fetch_array(MYSQLI_ASSOC))
                                {
                                    $qpc=$sel["pro_quantity"];
                                    $tpc+=$qpc;
                                }
                            }
                            ?>
                            Cart[<?php echo $tpc;?>]

                        </div>
                    </div></a>
                </div>
                </form>
            </div>
            <div class="header2">
                <div class="cat" onmouseover="fun()" onmouseleave="fun2()">CATEGORIES
                    <div class="all" id="all">
                    <?php
                    require_once("../view-catcontroller.php");
                    $cat=new categories();
                    $cat->select_data();
                    echo $cat->print_catagories_user()
                    ?>
                        
                    </div>
                </div>
                <div class="menu">
                    <a href="home.php"><div class="m1">Home</div></a>
                    <a href="Products.php"><div class="m1">Products</div></a>
                    <a href="contact.php"><div class="m1">Contact</div></a>
                </div>
            </div>
        </div>
    </body>
</html>