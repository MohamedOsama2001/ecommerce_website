<?php
require_once("catmodel.php");
require_once("connection.php");
$cat=new category();
if(isset($_POST["cname"])==true && $_POST["cname"]!="")  
{
    $image=$_FILES["cimage"];
    $filename="image/".$image["name"];
    $cat->set_cname($_POST["cname"]);
    $cat->set_cimage($filename);
    if(move_uploaded_file($image["tmp_name"],"$filename")==true)
    {
        $con->query("INSERT INTO categories VALUES(null,'".$cat->get_cname()."','".$cat->get_cimage()."')");
        if($con->affected_rows!=0)
        {
            header("location:admin/index.php");
        }
    }
    else
    {
       header("location:admin/add-cat.php");
    }

}
else
{
    header("location:admin/add-cat.php");
}

?>