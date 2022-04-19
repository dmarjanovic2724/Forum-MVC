<?php

class PostModel
{

    private $db;
    public function __construct()
    {
        $this->db= new Database;
    }

    public function getAllPosts($id){
        $this->db->query("SELECT * from posts WHERE topic_id = :id");
        $this->db->bind(":id",$id);
        return $this->db->multipleSet();
    }

    public function create($post_text, $topic_id)
    {
        $data= date('Y-m-d H:i:s');
        $userId=getUserSession()->id;
       

        $this->db->query("INSERT into posts (post_text, post_date, topic_id, user_id) VALUES ( :post_text,:data, :topic_id, :user_id)");
        $this->db->bind(":post_text", $post_text);
        $this->db->bind(":data", $data);
        $this->db->bind(":topic_id", $topic_id);
        $this->db->bind(":user_id", $userId);
        $this->db->execute();
    }

    public function getTopicNameById($id)
    {
        $this->db->query("SELECT id, topic_name from topics WHERE id= :id");
        $this->db->bind(":id",$id);
        return $this->db->singleSet();

    }

    public function deletePost($id){
        $this->db->query("DELETE FROM posts WHERE id=:id");
        $this->db->bind(":id",$id);
        return $this->db->execute();
    }

    public function update($id ,$post_text, $topic_id)
    {
        $data= date('Y-m-d H:i:s');
        $userId=getUserSession()->id;
       
       
        $this->db->query("UPDATE posts SET id=:id, post_text=:post_text, post_date=:data, topic_id=:topic_id, user_id=:user_id WHERE id=:id");
        $this->db->bind(":post_text", $post_text);
        $this->db->bind(":data", $data);
        $this->db->bind(":topic_id", $topic_id);
        $this->db->bind(":user_id", $userId);
        $this->db->bind(":id", $id);
        $this->db->execute();
    }

    public function getPostById($id)
    {
        $this->db->query("SELECT * from posts WHERE id= :id");
        $this->db->bind(":id",$id);
        return $this->db->singleSet();

    }

    public function topicDone($id)
    {
        
        $this->db->query("UPDATE topics SET topic_done='1' WHERE id = :id");
        $this->db->bind(":id",$id);
        $this->db->execute();
    }   

  
    

  

}