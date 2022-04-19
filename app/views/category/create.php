
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

<?php  flash('cat_created')?>
<a href="/home/welcome">dashboard</a>

                <h3 class="text-center text-info">Create category</h3>
                <form action="<?php echo URLROOT.'category/create' ?>" method="POST">

                    <div class="form-group">
                        <label for="cat_name">Category name</label>
                        <input type="text" class="form-control <?php echo !empty($data['cat_name_err']) ? 'is-invalid' : ''; ?>" id="cat_name" name="cat_name">
                        <span class="text-danger "><?php echo !empty($data['cat_name_err']) ? $data['cat_name_err'] : ''; ?></span>
                    </div>

                    <div class="form-group">
                        <label for="cat_description">Category description</label>
                        <input type="text" class="form-control <?php echo !empty($data['cat_description_err']) ? 'is-invalid' : ''; ?>" id="cat_description" name="cat_description">
                        <span class="text-danger "><?php echo !empty($data['cat_description_err']) ? $data['cat_description_err'] : ''; ?></span>
                    </div>

                    <div class="row justify-content-between no-gutters">
                        <a href="<?php echo URLROOT.'home/welcome' ?>" class="text-primary">Register not yet ! go to register </a>
                        <div>
                            <button class="btn btn-outline-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
   

