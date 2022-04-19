<?php
// require_once APPROOT.'/views/inc/header.php' 
?>
<?php
//  require_once APPROOT.'/views/inc/nav.php' 
?>



<!-- Page Content  -->

<div class="container-fluid my-5">
    <div class="container">
        <div class="card col-md-8 offset-md-2 p-5 bg-light">

            <?php flash('topic_created') ?>
            <a href="/home/welcome">dashboard</a>

            <h3 class="text-center text-info">Edit post <?php echo getSession('cat'); ?></h3>

            <form action="<?php echo URLROOT . "post/edit/" . $data['post']->id ?>" method="POST">
                <div class="form-group">
                    <label for="cat_name">Post text</label>
                    <input name="post_text" type="text" value="<?php echo $data['post']->post_text ?>">
                </div>

                <div>
                    <button class="btn btn-outline-primary">Submit</button>
                    <?php cancle() ?>
                </div>
        </div>
        </form>
    </div>
</div>

</div>