<?php

class Post extends Controller
{

    public function __construct()
    {
        $this->postModel = $this->model('PostModel');
    }
    public function home($id)
    {
        $this->checkUser();
        
        
        putSession('topic', $id[1]);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') 
            {
                $this->postModel->topicDone($id[1]);
            }           
        $data['post'] = $this->postModel->getAllPosts(getSession('topic'));
        $data['topic'] = $this->postModel->getTopicNameById(getSession('topic'));      

        $this->view("post/home", $data);
    }

    public function create()
    {
        // $data['topic'] = $this->postModel->getTopicNameById(getSession('topic'));
        $id = getSession('topic');

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $data = [

                'post_text' => '',
                'post_text_err' => ''
            ];

            $data['post_text'] = $_POST['post_text'];

            if (empty($data['post_text'])) {
                $data['post_text_err'] = 'Topic name is required';
            }
            if (empty($data['post_text_err'])) {
                $this->postModel->create($data['post_text'], $id);
                flash('post_created', "topic created");
                redirect("/post/home/$id");
            }

            $this->view("post/create", $data);
        }
        $this->view("post/create");
    }

    public function edit($id)
    {
        $data['post'] = $this->postModel->getPostById($id[1]);
        putSession('post', $id[1]);
        $idTopic = getSession('topic');

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = getSession('post');
            $text = $_POST['post_text'];
            $this->postModel->update($id, $text, $idTopic);
            flash('post_created', "topic created");
            redirect("/post/home/$idTopic");
        }
        $this->view("post/edit", $data);
    }

    public function delete($id)
    {
        if ($this->postModel->deletePost($id[1])) {
            redirect('/post/home/' . getSession('topic'));
        }
    }

    
    
}
