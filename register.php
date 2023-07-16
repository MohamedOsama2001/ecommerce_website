<?php
require_once("connection.php");
if(isset($_POST["name"])==true && $_POST["name"]!="")
{
    $name=$_POST["name"];
    $email=$_POST["email"];
    $pass=$_POST["password"];
    $cpass=$_POST["cpassword"];
    $user_type=$_POST["user_type"];
    $r=$con->query("SELECT*FROM users WHERE email='$email' AND password='$pass'");
    if(mysqli_num_rows($r) > 0)
    {
        $message[]="user already exist!Please click on login now";
    }
    else
    {
        if($pass != $cpass )
        {
            $message[]="confirm password not matched";
        }
        else
        {
            $con->query("INSERT INTO users Values(null,'$name','$email','$pass','$user_type')");
            if($con->affected_rows!=0)
            {
                header("location:index.php");
            }
        }
    }

}
?>
<html>
    <head>
        <title>Register</title>
        <link rel="stylesheet" href="style.css">
        <script>
            function check()
            {
                n=document.getElementById("name").value;
                e=document.getElementById("email").value;
                p=document.getElementById("password").value;
                cp=document.getElementById("cpassword").value;
                vn= /^([A-Z][a-z]{2,}[\s])([A-Z][a-z]{2,})$/;
                ve= /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
                vp= /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/;
                if(e=="" || p=="" || n=="" || cp=="")
                {
                    alert("Empty Field");
                }
                else{
                    if(ve.test(e)==true && vp.test(p)==true && vn.test(n)==true)  
                    {
                        document.myform.submit();
                    }
                    else
                    {
                        if(vn.test(n)==true)
                        {
                            document.getElementById('text2').innerHTML = "valid name";
                            document.getElementById('text2').style.color = "green";
                        }
                        else
                        {
                            document.getElementById('text2').innerHTML = "The name must consist of the first name space second name letters only";
                            document.getElementById('text2').style.color = "red";  
                        }
                        if(ve.test(e)==true)
                        {
                            document.getElementById('text').innerHTML = "valid email";
                            document.getElementById('text').style.color = "green";
                        }
                        else
                        {
                            document.getElementById('text').innerHTML = "The email contain letters&digits&special&characters&dots";
                            document.getElementById('text').style.color = "red";  
                        }
                        if(vp.test(p)==true)
                        {
                            document.getElementById('text1').innerHTML = "valid password";
                            document.getElementById('text1').style.color = "green";
                        }
                        else
                        {
                            document.getElementById('text1').innerHTML = "The password must be between 6 and 20 characters and contain at least one numeric digit, one uppercase and one lowercase letter";
                            document.getElementById('text1').style.color = "red";
                        }
                    }

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
            <form action="register.php" method="post" name="myform">
                <h1>REGISTER NOW</h1>
                <input type="text" name="name" id="name" placeholder="Enter Your Name">
                <div id="text2"></div>
                <input type="text" name="email" id="email" placeholder="Enter Your Email">
                <div id="text"></div>
                <input type="password" name="password" id="password" placeholder="Enter Your Password">
                <div id="text1"></div>
                <input type="password" name="cpassword" id="cpassword" placeholder="Confirm Your Password">
                <select  class="select" name="user_type">
                    <option value="user">user</option>
                    <option value="admin">admin</option>
                </select>
                <input type="button" value="Register Now" onclick="check()">
                <div class="l1">already have an account? <a href="index.php">login now</a></div>

            </form>
        </div>
    </body>
</html>
