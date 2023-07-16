<?php
require_once("connection.php");
session_start();
if(isset($_POST["email"])==true && $_POST["email"]!="")
{
    $email=$_POST["email"];
    $pass=$_POST["password"];
    $r=$con->query("SELECT*FROM users WHERE email='$email' AND password='$pass'");
    if($r->num_rows>0)
    {
        $select = $r->fetch_array(MYSQLI_ASSOC);
        if($select["user_type"]=='admin')
        {
            $_SESSION["admin_name"]=$select["name"];
            $_SESSION["admin_email"]=$select["email"];
            $_SESSION["admin_id"]=$select["id"];
            header("location:admin/index.php");
        }
        elseif($select["user_type"]=='user')
        {
            $_SESSION["user_name"]=$select["name"];
            $_SESSION["user_email"]=$select["email"];
            $_SESSION["user_id"]=$select["id"];
            header("location:user/home.php");

        }
    } 
    else
    {
        $message[]="incorrect email or password!";

    }
}
?>
<html>
    <head>
        <title>login</title>
        <link rel="stylesheet" href="style.css">
        <script>
            function check()
            {
                e=document.getElementById("email").value;
                p=document.getElementById("password").value;
                if(e=="" || p=="")
                {
                    alert("Empty Field");
                }
                else 
                {
                    document.myform.submit();
                }
                   

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
        <div class="login">
            <form action="index.php" method="post" name="myform">
                <h1>LOGIN NOW</h1>
                <input type="text" name="email" id="email" placeholder="Enter Your Email">
                <input type="password" name="password" id="password" placeholder="Enter Your Password">
                <input type="button" value="Login Now" onclick="check()">
                <div class="l1">do not have an account? <a href="register.php">register now</a></div>

            </form>
        </div>
    </body>
</html>
