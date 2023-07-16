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
        <title>Checkout</title>
        <link rel="stylesheet" href="../style.css">
        <script>
            function order()
            {
                name=document.getElementById("name").value;
                email=document.getElementById("email").value;
                phone=document.getElementById("phone").value;
                sad=document.getElementById("sad").value;
                city=document.getElementById("city").value;
                country=document.getElementById("country").value;
                Cardnumber=document.getElementById('cardn').value;
                ExpirayDate=document.getElementById('expdate').value;
                Cvv=document.getElementById('cvv').value; 
                cn=/^[4|5|7][0-9]{3}[-][0-9]{4}[-][0-9]{4}[-][0-9]{4}$/;
                ed=/(([0][0-9])|([1][0-2]))[/][2][0][2-9]{2}$/;
                cv=/[0-9][0-9][0-9]/;
                if(name=="" || email=="" || phone=="" || sad=="" || city=="" || country=="")
                {
                    alert("Empty Field!");
                }
                else
                {
                    if(cn.test(Cardnumber)==true && ed.test(ExpirayDate)==true && cv.test(Cvv)==true)  
                    {
                        document.myform.submit();
                    }
                    if(cn.test(Cardnumber)==true)
                        {
                            document.getElementById('div1').innerHTML = "Valid Number";
                            document.getElementById('div1').style.color = "green";
                        }
                        else
                        {
                            document.getElementById('div1').innerHTML = "Wrong Card Number";
                            document.getElementById('div1').style.color = "red";  
                        }
                        if(ed.test(ExpirayDate)==true)
                        {
                            document.getElementById('div2').innerHTML = "Valid Date";
                            document.getElementById('div2').style.color = "green";
                        }
                        else
                        {
                            document.getElementById('div2').innerHTML = "Invalid Date";
                            document.getElementById('div2').style.color = "red";  
                        }
                        if(cv.test(Cvv)==true)
                        {
                            document.getElementById('div3').innerHTML = "Valid CVV";
                            document.getElementById('div3').style.color = "green";
                        }
                        else
                        {
                            document.getElementById('div3').innerHTML = "Invalid CVV";
                            document.getElementById('div3').style.color = "red";
                        }
                }
            }
            function methodnone()
            {
                document.getElementById('cardn').style.display="none";
                document.getElementById('expdate').style.display="none";
                document.getElementById('cvv').style.display="none";

            }
            function methodblock()
            {
                document.getElementById('cardn').style.display="block";
                document.getElementById('expdate').style.display="block";
                document.getElementById('cvv').style.display="block";

            }
        </script>
    </head>
    <body>
    <?php
        require_once("header.php");
        ?>
        <div class="show">
            <div class="s1">Home/ <mo style="color:gray;">Checkout</mo></div>
            <?php
            $grandtotal=0;
            $r=$con->query("SELECT*FROM cart WHERE user_id='$user_id'");
            if($r->num_rows>0)
            {
                echo'<div class="checkbox1">';
                while($sel=$r->fetch_array(MYSQLI_ASSOC))
                {
                    $subtotal=$sel["pro_price"]*$sel["pro_quantity"];
                    $grandtotal+=$subtotal;
                    echo'
                    <div class="checkbox">
                    '.$sel["pro_name"].' <mo style="color:#0e8ce4">('.$sel["pro_price"].' $ x '.$sel["pro_quantity"].')</mo>
                    </div>
                    ';
                }
                echo'</div>';
                echo"<div class='checkbox2'><mo style='color:black;' >Grand Total</mo> : ".$grandtotal." $</div>";
                echo'
                <div class="checkoutform">
                <h2>PLACE YOUR ORDER</h2>
                <form action="cart.php" method="post" name="myform">
                <input type="text" name="name" id="name" placeholder="Name:"><br>
                <input type="text" name="email" id="email" placeholder="Email:"><br>
                <input type="text" name="phone" id="phone" placeholder="Phone:"><br>
                <input type="text" name="sad" id="sad" placeholder="Street Adrees:"><br>
                <input type="text" name="city" id="city" placeholder="City:"><br>
                <input type="text" name="country" id="country" placeholder="Country:"><br>
                <input type="text" name="cardn" id="cardn" placeholder="Card Number:" style="display:none;"><br>
                <div style="text-align: center;" id="div1"></div><br>
                <input type="text" name="expdate" id="expdate" placeholder="Expiray Date:" style="display:none;"><br>
                <div style="text-align: center;" id="div2"></div><br>
                <input type="text" name="cvv" id="cvv" placeholder="CVV:" style="display:none;"><br>
                <div style="text-align: center;" id="div3"></div><br>
                <input type="radio" name="method" value="cash on delivery" onclick="methodnone()"> <b>cash on delivery</b>
                <input type="radio" name="method" value="credit card" onclick="methodblock()"> <b>credit card</b><br>
                <input type="button" value="Order Now" onclick="order()">
                

                </form>
                </div>

                ';
            }
            ?>

        </div>
        <?php 
        require_once("footer.php");
        ?>
    </body>
</html>