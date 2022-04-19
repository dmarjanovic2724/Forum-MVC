<div class="container">
    <div class="row  justify-content-center">
        <div class="col-md-8 ">
           <?php previous("category/home", "Back") ?>
            <?php linkTo("topic/create", "Create topic") ?>
            <table class="table">
                <thead>
                    <tr>
                        
                        <th scope="col">Topic name</th>
                        <th scope="col">Num of Posts</th>
                        <th scope="col">Date Created</th>
                        <th scope="col">Created by</th>
                    </tr>
                </thead>
                <tbody>              
                <?php foreach ($data['topic'] as $topic) : ?>
                        <tr>
                                
                            <td><a href="<?php echo URLROOT . 'post/home/' . $topic->id; ?>"><?php echo $topic->topic_name; ?></a></td>
                            <td> <?php echo $topic->topic_date; ?></td>
                            <td> <?php echo $topic->topic_date; ?></td>
                            <td> <?php echo $topic->created_by; ?></td>
                        </tr>
                </tbody>
            <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>