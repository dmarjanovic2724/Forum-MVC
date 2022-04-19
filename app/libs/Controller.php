<?php

class Controller{

    public function view($view,$data=[]){
        if(file_exists("../app/views/".$view.".php" ));{
            require_once "../app/views/layouts/head.php";
            require_once  "../app/views/".$view.".php" ;
            require_once "../app/views/layouts/footer.php";
        }
    }  

    public function model($model){
        
        if(file_exists("../app/models/".$model.".php")){
            require_once "../app/models/".$model.".php";
            return new $model;

        }
    }

    public function checkUser(){
        if(!getUserSession()){
            flash('logIn','You need to login');
            redirect('/user/login');
          
        }
    }
    
}