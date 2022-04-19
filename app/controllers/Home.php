<?php

class Home extends Controller{

   public function __construct()
   {
    $this->topicModel=$this->model('TopicModel');
    $this->usersModel=$this->model('UserModel');
   }
    

    public function welcome()
    {
        if($_SERVER['REQUEST_METHOD']=="POST"){
            $_POST=filter_input_array(INPUT_POST,FILTER_SANITIZE_SPECIAL_CHARS);
                    
            $data=[
                'topic'=>'',
                'user'=>'',
                'topic_err'=>'',
                'user_err'=>''
            ];
            if(!empty($_POST['topic']))
            {
                $data['topic']=$_POST['topic'];
            }else{
                $data['topic_err']="Topic required";
            }
            if(!empty($_POST['user']))
            {
                $data['user']=$_POST['user'];
            }else{
                $data['user_err']="user is required";
            }
         
         

                if(empty($data['topic_err']) &&empty($data['user_err']))
                {
                    
                $this->usersModel->change($data);
                } 
           
            }
        $data['getAllUsers']=$this->usersModel->getAllUsers();
        $data['usersTopic']=$this->topicModel->getTopicbyUser();      
     
        $this->view('home/welcome', $data);
    }

   
}






