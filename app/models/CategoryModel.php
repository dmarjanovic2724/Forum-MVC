<?php

class CategoryModel
{
    private $db;
    public function __construct()
    {
        $this->db= new Database;
    }

    public function createCategory($cat_name, $cat_description){
        $this->db->query("INSERT into categories (cat_name, cat_description) VALUES( :cat_name, :cat_description)");
       $this->db->bind(":cat_name",$cat_name);
       $this->db->bind(":cat_description",$cat_description);
       $this->db->execute();
    }

    public function getAllCategory(){
        $this->db->query("SELECT * from categories");
       return $this->db->multipleSet();
    }

}