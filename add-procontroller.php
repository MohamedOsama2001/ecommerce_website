<?php
require_once("productmodel.php");
require_once("connection.php");
$pro=new product();
if(isset($_POST["pro_name"])==true && $_POST["pro_name"]!="")
{
    $pimage=$_FILES["pro_image"];
    $pfilename="image/".$pimage["name"];
    $pro->set_cat_id($_POST["cat_id"]);
    $pro->set_pname($_POST["pro_name"]);
    $pro->set_pimage($pfilename);
    $pro->set_pprice($_POST["price"]);
    $pro->set_brand($_POST["brand"]);
    $pro->set_pos($_POST["os"]);
    $pro->set_brand($_POST["brand"]);
    $pro->set_full_desc($_POST["full_desc"]);
    if(move_uploaded_file($pimage["tmp_name"],"$pfilename")==true)
    {
        $con->query("INSERT INTO products VALUES(null,'".$pro->get_cat_id()."','".$pro->get_pname()."','".$pro->get_pimage()."',
        '".$pro->get_brand()."','".$pro->get_pprice()."','".$pro->get_pos()."','".$pro->get_full_desc()."')");
        if($con->affected_rows!=0)
        {
            header("location:admin/index.php");
        }
        
    }
    else
    {
        header("location:admin/add-product.php");
    }
}
else
{
    header("location:admin/add-product.php");
}




?>