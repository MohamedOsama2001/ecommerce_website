<?php
class product
{
    public $pid;
    public $cat_id;
    public $pname;
    public $pprice;
    public $pimage;
    public $brand;
    public $pos;
    public $pfull_desc;
    function set_pid($x)
    {
        $this->pid=$x;
    }
    function get_pid()
    {
        return $this->pid;
    }
    function set_cat_id($x)
    {
        $this->cat_id=$x;
    }
    function get_cat_id()
    {
        return $this->cat_id;
    }
    function set_pname($x)
    {
        $this->pname=$x;
    }
    function get_pname()
    {
        return $this->pname;
    }
    function set_pprice($x)
    {
        $this->pprice=$x;
    }
    function get_pprice()
    {
        return $this->pprice;
    }
    function set_pimage($x)
    {
        $this->pimage=$x;
    }
    function get_pimage()
    {
        return $this->pimage;
    }
    function set_brand($x)
    {
        $this->brand=$x;
    }
    function get_brand()
    {
        return $this->brand;
    }
    function set_pos($x)
    {
        $this->pos=$x;
    }
    function get_pos()
    {
        return $this->pos;
    }
    function set_full_desc($x)
    {
        $this->full_desc=$x;
    }
    function get_full_desc()
    {
        return $this->full_desc;
    }
    function print()
    {
        $txt="
        <a href='product-detail.php?pid=".$this->get_pid()."'><div class='product'>
        <img src='../".$this->get_pimage()."'>
        <div class='text1'>".$this->get_pprice()." $</div>
        <div class='text'>".$this->get_pname()."</div>
        </div></a>
        ";
        return $txt;
    }
}
?>