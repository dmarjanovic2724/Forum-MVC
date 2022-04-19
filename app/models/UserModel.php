<?php

class UserModel
{
    private $db;
    public function __construct()
    {
       $this->db = new Database(); 
    }
    public function getAllUsers(){
        $this->db->query("SELECT * FROM users");
        return $this->db->multipleSet();
    }

    public function getSingle($id)
    {
        $this->db->query("SELECT * FROM users WHERE id=:id");
        $this->db->bind(":id",$id);
        return $this->db->singleSet();

    }  
    
    public function getUserByEmail($email)
    {
        $this->db->query("SELECT * FROM users WHERE email=:email");
        $this->db->bind(":email", $email);
        $row=$this->db->singleSet();
        if(empty($row))
        {
            return false;
        }else{
            return $row;
        }

    }

    public function register($name, $email, $password)
    {
        $password=password_hash($password, PASSWORD_BCRYPT);
        $this->db->query("INSERT into users (name, email, password) VALUES(:name, :email, :password)");       
        $this->db->bind(":name",$name);
        $this->db->bind(":email",$email);
        $this->db->bind(":password", $password);
        $this->db->execute();
    }

    public function change(array $data)
    {
        $user=$data['user'];
        $topicId=$data['topic'];
        $this->db->query("UPDATE topics SET user_id=:user WHERE id = :topic");
        $this->db->bind(":user", $user);
        $this->db->bind(":topic",$topicId);
        $this->db->execute();
    }

   
}