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

            <h3 class="text-center text-info">Create post</h3>

            <form action="<?php echo URLROOT . 'post/create' ?>" method="POST">


                <div class="form-group">
                    <label for="cat_name">Post text</label>
                    <input type="text" class="form-control <?php echo !empty($data['post_text_err']) ? 'is-invalid' : ''; ?>" id="cat_name" name="post_text">
                    <span class="text-danger "><?php echo !empty($data['post_text_err']) ? $data['post_text_err'] : ''; ?></span>
                </div>
                <button class="btn btn-outline-primary">Create</button>   
                <?php cancle() ?>            
        </div>
    </div>
    </form>
</div>
</div>

</div>