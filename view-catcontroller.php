<?php
require_once("catmodel.php");
class categories
{
    public $con;
    public $array_categories;
    function __construct()
    {
        $this->con=new mysqli("localhost","root","","mohamedfinalproject");
        $this->array_categories=array();
    }
    function select_data()
    {
        $r=$this->con->query("SELECT*FROM categories");
        while($sel=$r->fetch_array(MYSQLI_ASSOC))
        {
            $catgories=new category();
            $catgories->set_cid($sel["id"]);
            $catgories->set_cname($sel["cname"]);
            $catgories->set_cimage($sel["cimage"]);
            array_push($this->array_categories,$catgories);
        }
    }
    function select_products($id)
    {
        $x="";
        if($id==true && $id!="")
        {
            $x="WHERE cat_id=$id";
        }
        $r=$this->con->query("SELECT*FROM products $x ORDER BY id DESC");
        if($r->num_rows==0)
        {
            echo "<div class='emptyproducts'>No Products Added Yet!</div>";
        }
        $cat=new category();
        $cat->set_cid($id);
        while($sel1=$r->fetch_array(MYSQLI_ASSOC))
        {
            $pro=new product();
            $pro->set_pid($sel1["id"]);
            $pro->set_cat_id($sel1["cat_id"]);
            $pro->set_pname($sel1["pro_name"]);
            $pro->set_pimage($sel1["pro_image"]);
            $pro->set_brand($sel1["brand"]);
            $pro->set_pprice($sel1["price"]);
            $pro->set_pos($sel1["os"]);
            $pro->set_full_desc($sel1["full_desc"]);
            array_push($cat->array_products,$pro);

        }
        return $cat;
    }
    function print_categories()
    {
        $txt="";
        for($i=0;$i<count($this->array_categories);$i++)
        {
            $txt.="<a href='view-products.php?id=".$this->array_categories[$i]->get_cid()."'><div class='categories'><img src='../".$this->array_categories[$i]->get_cimage()."' width='100px' height='100px'>
            <div class='text'>".$this->array_categories[$i]->get_cname()."</div>
            </div></a>";
        }
        return $txt;
    }
    function print_catagories_user()
    {
        $txt="";
        for($i=0;$i<count($this->array_categories);$i++)
        {
            $txt.="<a href='products.php?id=".$this->array_categories[$i]->get_cid()."'><div class='ucat'>".$this->array_categories[$i]->get_cname()."</div></a>";
        }
        return $txt;
    }
}
?>