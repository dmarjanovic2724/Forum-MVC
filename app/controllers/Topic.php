<?php

class Topic extends Controller
{
 public function __construct()
 {
     $this->topicModel=$this->model('TopicModel');
 }


 public function home($id){

     $this->checkUser();
     putSession('cat',$id[1]);    
     $id= putSession('cat',$id[1]);   
     $data=[
         'topic'=>'',
         'catName'=>''        
     ];
     
     $data['topic']=$this->topicModel->getAlltopics(getSession('cat'));  
     $data['catName']=  $this->topicModel->getCatNameById(getSession('cat'));  
    //  foreach($data['topic'] as $id)
    //  {
        
    //     $data[]=$this->topicModel->numOfPostsInTopic($id->id);
       
       
    //  }

  

    //  var_dump($data['numOfPost']);

     
     $this->view("topic/home", $data);
 }

 public function create()
 {

   $id=getSession('cat');
   $data['catName']=  $this->topicModel->getCatNameById(getSession('cat'));
   
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $data=[
            'topic'=>'',
            'catName'=>'',
            'topic_name'=>'',
            'topic_name_err'=>''
        ];
      ;
        
        $data['topic_name']=$_POST['topic_name'];
        
        if(empty($data['topic_name']))
        {
            $data['topic_name_err']='Topic name is required';
        }
        if(empty($data['topic_name_err'])){
            $this->topicModel->create($data['topic_name'], $id);
            flash('topic_created',"topic created");   
            redirect("/topic/home/$id");

        }
     
        $this->view("topic/create", $data);
    }
    $this->view("topic/create",$data);

 }
}