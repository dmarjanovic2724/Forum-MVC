<?php

class Category extends Controller
{
    public function __construct()
{
    $this->CatModel=$this->model('CategoryModel');
}

    public function home(){

  $this->checkUser();
  $data['cat']=$this->CatModel->getAllCategory();
  $this->view("category/home", $data);   
   
}

public function create(){

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $data=[
            'cat_name'=>$_POST['cat_name'],
            'cat_description'=>$_POST['cat_description'],
            'cat_name_err'=>'',
            'cat_description_err'=>''
        ];

        if(empty($data['cat_name']))
        {
            $data['cat_name_err']='Category name is required';
        }
        if(empty($data['cat_description']))
        {
            $data['cat_description_err']='Description is required';
        }

        if(empty($data['cat_name_err']) && empty($data['cat_description_err']))
        {
            $this->CatModel->createCategory($data['cat_name'], $data['cat_description']);
            flash('cat_created',"Category created");   
            redirect("/category/create");
        }else{
            $this->view("/category/create", $data);
        }
       

        }else{
            $this->view("/category/create");
        }
    }



}

