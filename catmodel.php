<?php
require_once("productmodel.php");
class category
{
    public $cid;
    public $cname;
    public $cimage;
    public $array_products;
    function __construct()
    {
        $this->array_products=array();
    }
    function set_cid($x)
    {
        $this->cid=$x;
    }
    function get_cid()
    {
        return $this->cid;
    }
    function set_cname($x)
    {
        $this->cname=$x;
    }
    function get_cname()
    {
        return $this->cname;
    }
    function set_cimage($x)
    {
        $this->cimage=$x;
    }
    function get_cimage()
    {
        return $this->cimage;
    }
    function get_array_products()
    {
        return $this->array_products;
    }
    function print_array_products()
    {
        $txt="";
        for($i=0;$i<count($this->array_products);$i++)
        {
            $txt.=$this->array_products[$i]->print();
        }
        return $txt;
    }
}
?>