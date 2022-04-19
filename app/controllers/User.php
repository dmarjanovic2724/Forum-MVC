<?php


class User extends Controller
{
public function __construct()
{
    $this->UserModel=$this->model('UserModel');
}

public function register()
{
    if($_SERVER['REQUEST_METHOD']=="POST"){
        $_POST=filter_input_array(INPUT_POST,FILTER_SANITIZE_SPECIAL_CHARS);
        $data=[
            'name'=> $_POST['name'],
            'email'=>$_POST['email'],
            'password'=>$_POST['password'],
            "confirm_password"  => $_POST['confirm_password'],
            'name_err'=>'',
            'email_err'=>'',
            'password_err'=>'',
            'confirm_password_err'=>''
        ];

        if(empty($data['name'])){
            $data['name_err']="User name is required";
        
        }

        if(empty($data['email'])){
            $data['email_err']="Email is required";
        }else{   
            if($this->UserModel->getUserByEmail($data['email'])){
                $data['email_err']="Email is already taken";
            }
        }
        if(empty($data['password'])){
            $data['password_err']="Password is required";
        }

        if(empty($data['confirm_password'])){
            $data['confirm_password_err']="Confirm password is required";
        }else{
            if($data['password'] != $data['confirm_password']){
                $data['confirm_password_err']="Password do not match";
                }
        }

        if(empty($data['name_err']) && empty($data['password_err']) && empty($data['email_err']) && empty($data['confirm_password_err']) )
        {
          
            $this->UserModel->register($data['name'], $data['email'], $data['password']);
                flash('register_success',"Register successfull, please login");              
                $this->view("/user/login");
          
        }else{
           
            $this->view("/user/register", $data);           
        }
       
    }else{
        $this->view("/user/register");
    }

   
}

public function login()
{
    if($_SERVER['REQUEST_METHOD'] =='POST')
    {
        $data=[
            'email'=>$_POST['email'],
            'password'=>$_POST['password'],
            'email_err'=>'',
            'password_err'=>''
        ];
       
       
        if(empty($data['email']))
        {
            $data['email_err']="Email is required";
        }
        if(empty($data['password']))
        {
            $data['password_err']="password is required";
        }
        if(empty($data['email_err']) && empty($data['password_err']))
        {
            $user=$this->UserModel->getUserByEmail($data['email']);
           if($user)
           {
               $hash_pass=$user->password;
               if(password_verify($data['password'], $hash_pass))
               {
                setUserSession($user);
                
                redirect('/category/home');
               }
           }else
           {
               flash("login_fail","Incorect Email or password");
               return $this->view('user/login');
           }
        }        
        $this->view('user/login', $data);
    }
    $this->view('user/login');
}

public function logout(){
    session_destroy();
    redirect("/user/login/");
}



}

