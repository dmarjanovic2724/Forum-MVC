<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <h1>Post's of <?php echo $data['topic']->topic_name."" ?></h1>
          
            <?php previous("topic/home/".getSession('cat'),"go back")?>       
            <?php linkTo("post/create","Create post") ?>  
            
            <form action="" method="post">

            <button class="btn btn-outline-primary">Close topic</button>   
            </form>
            <?php foreach ($data as $post) : ?>             
              <div class="card mt-4">
                    <div class="card-header text-end">
                        <?php echo $post->post_date; ?>
                    </div>                    
                    <div class="card-body">
                    <i class='fas fa-comments'></i>
                        <?php echo "". $post->post_text; ?>
                        <div class="text-end">
                        <?php if (getUserSession()->id == $post->user_id) : ?>
                            <a  href="<?php echo URLROOT . 'post/edit/' . $post->id; ?>"><i class="fas fa-edit"></i></i></a>
                            <a href="<?php echo URLROOT . 'post/delete/' . $post->id; ?>"><i class="fas fa-trash-alt"></i></a>
                        <?php endif; ?>
                        </div>
                    </div>
                </div>             
            <?php endforeach;?>
        </div>
    </div>
</div>