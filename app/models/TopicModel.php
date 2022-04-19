<?php

class TopicModel
{
    private $db;

    public function __construct()
    {
        $this->db=new Database;
    }

    public function getAlltopics($cat_id){
        $this->db->query("SELECT topics.id ,topics.topic_name, topics.topic_date, topics.topic_done, categories.cat_name, users.name AS 'created_by' FROM users INNER JOIN topics ON topics.user_id = users.id INNER JOIN categories ON topics.cat_id = categories.id WHERE cat_id = :cat_id");
        $this->db->bind(":cat_id",$cat_id);
        return $this->db->multipleSet();
    }

    public function getAlltopic1s($cat_id){
        $this->db->query("SELECT * from topics WHERE cat_id = :cat_id");
        $this->db->bind(":cat_id",$cat_id);
        return $this->db->multipleSet();
    }

    public function create($topic_name, $cat_id)
    {
        $data= date('Y-m-d H:i:s');
        $userId=getUserSession()->id;
        $this->db->query("INSERT INTO topics (topic_name, topic_date, cat_id, user_id) VALUES( :topic_name, :topic_date, :cat_id, :user_id)");
        $this->db->bind(":topic_name",$topic_name);
        $this->db->bind(":topic_date",$data);
        $this->db->bind(":cat_id",$cat_id);
        $this->db->bind(":user_id",$userId);

        $this->db->execute();
    }

    public function getCatNameById($id)
    {
        $this->db->query("SELECT id, cat_name from categories WHERE id= :id");
        $this->db->bind(":id",$id);
        return $this->db->singleSet();
    }

    public function getTopicbyUser()
    {
        $userId=getSession('currentUser')->id;        
        $this->db->query("SELECT id, topic_name FROM topics WHERE user_id = :userId");
        $this->db->bind(":userId",$userId);
        return $this->db->multipleSet();
    }

    public function numOfPostsInTopic($id)
    {
        $this->db->query("SELECT COUNT(`post_text`) as numOfPosts
        FROM posts
        WHERE topic_id = :id");
        $this->db->bind(":id",$id);
        return $this->db->singleSet();
    }
 

    
   
}