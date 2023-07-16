<?php
require_once("../connection.php");
session_start();
$user_id=$_SESSION["user_id"];
if(isset($user_id)!=true)
{
    header("location:../index.php");
}
if(isset($_POST["name"])==true && $_POST["name"]!="")
{
    $name=$_POST["name"];
    $email=$_POST["email"];
    $sub=$_POST["subject"];
    $msg=$_POST["msg"];
    $r=$con->query("SELECT*FROM message WHERE name='$name' AND email='$email' AND subject='$sub' AND msg='$msg' ");
    if($r->num_rows>0)
    {
        $message[]= "Message Sent Already!";
    }
    else
    {
        $con->query("INSERT INTO message VALUES(null,'$user_id','$name','$email','$sub','$msg')");
        $message[]= "Message Sent Successfully!";
    }
}
?>
<html>
    <head>
        <title>Contact</title>
        <link rel="stylesheet" href="../style.css">
        <script>
            function fun1()
            {
                n=document.getElementById("mo").value;
                e=document.getElementById("mo1").value;
                s=document.getElementById("mo2").value;
                m=document.getElementById("mo3").value;
                if(n=="" || e=="" || s=="" || m=="" )
                {
                    alert("empty field");
                }
                else
                {
                    document.myform.submit();
                }
            }
        </script>
    </head>
    <body>
        <?php
        require_once("header.php");
        ?>
        <div class="show">
            <div class="s1">Home/ <mo style="color:gray;">Contact US</mo></div>
            <div class="d1">
            <div class="d2">
                <img width="30px" height="30px" src="../image\phone--v1.png" />
            </div>
            <h3>Phone:</h3>
            <center><b class="d3">01152673206</b></center>
            </div>
            <div class="d1">
            <div class="d2">
                <img width="30px" height="30px" src="../image\filled-message.png" />
            </div>
            <h3>Email:</h3>
            <center><b class="d3">ma8556432@gmail.com</b></center>
            </div>
            <div class="d1">
            <div class="d2">
                <img width="30px" height="30px" src="../image\building.png" />
            </div>
            <h3>Visit us:</h3>
            <center><b class="d3">El Omda street-Mejwal-<br>Banha-Qalyubia</b></center>
            </div>
            <form action="contact.php" method="post" name="myform">
            <div class="d4">
            <center>
                <h2>Do You Have Any Question?</h2>
            </center>
            <input id="mo" type="text" placeholder="Name:" name="name" />
            <input id="mo1" type="text" placeholder="E-mail:" name="email"/>
            <input id="mo2" class="d5" type="text" placeholder="Subject:" name="subject" />
            <input id="mo3" class="d5" type="text" placeholder="Message:" name="msg" />
            <input class="d7" type="button" value="Send" onclick="fun1();" />
            </div>
            </form>
        

        </div>
        <?php 
        require_once("footer.php");
        ?>
    </body>
</html>