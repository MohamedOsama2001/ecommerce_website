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
        <title>Credit Card</title>
        <link rel="stylesheet" href="../style.css">
        <script>
            function cardval()
            {
                name = document.getElementById('name').value;
                number = document.getElementById('number').value;
                exp = document.getElementById('exp').value;
                cvv = document.getElementById('cvv').value;

                vname = /^(([A-Z][a-z]{2,}[\s]){2})([A-Z][a-z]{2,})$/;
                vnumber = /^[4||5||6||7][0-9]{3}[\s][0-9]{4}[\s][0-9]{4}[\s][0-9]{4}$/;
                vexp = /(([0][1-9])|([1][0-2]))[/][2][0][2][3-9]$/;
                vcvv = /[0-9][0-9][0-9]/;
                if(vname.test(name) == true && vnumber.test(number) == true && vexp.test(exp) == true && vcvv.test(cvv) == true )
                {
                    document.myform.submit();
                }
                else
                {
                if (vname.test(name) == true) {
                document.getElementById('val1').innerHTML = "valid name";
                document.getElementById('val1').style.color = "green";

                }
                else {
                document.getElementById('val1').innerHTML = "invalid name";
                document.getElementById('val1').style.color = "red";
                }
                if (vnumber.test(number) == true) {
                document.getElementById('val2').innerHTML = "valid number";
                document.getElementById('val2').style.color = "green";
                }
                else {
                document.getElementById('val2').innerHTML = "invalid number";
                document.getElementById('val2').style.color = "red";
                }
                if (vexp.test(exp) == true) {
                document.getElementById('val3').innerHTML = "valid date";
                document.getElementById('val3').style.color = "green";

                }
                else {
                document.getElementById('val3').innerHTML = "invalid date";
                document.getElementById('val3').style.color = "red";
                }
                if (vcvv.test(cvv) == true) {
                document.getElementById('val4').innerHTML = "valid cvv";
                document.getElementById('val4').style.color = "green";

                }
                else {
                document.getElementById('val4').innerHTML = "invalid cvv";
                document.getElementById('val4').style.color = "red";
                }
            }
            }
        </script>
    </head>
    <body>
    <?php
        require_once("header.php");
        ?>
        <div class="show">
            <div class="s1">Home/ <mo style="color:gray;">Product-Details</mo> / <mo style="color:gray;">Credit Card</mo></div>
            <div class="cardform">
                <form action="cart.php" method="post" name="myform">
                    <h2>Your Payment Details</h2>
                    <input type="text" name="name" id="name" placeholder="First Three Names of Your Name:">
                    <div id="val1"></div>
                    <input type="text" name="number" id="number" placeholder="Card Number: XXXX XXXX XXXX XXXX" >
                    <div id="val2"></div>
                    <input type="text" name="exp" id="exp" placeholder="Expiry Date:mon/year" >
                    <div id="val3"></div>
                    <input type="text" name="cvv" id="cvv" placeholder="CVV:">
                    <div id="val4"></div>
                    <input type="button" value="Pay Now" onclick="cardval()">
                </form>
            </div>

        </div>
        <?php 
        require_once("footer.php");
        ?>
    </body>
</html>