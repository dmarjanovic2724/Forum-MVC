		<!-- Page Content  -->

		<div class="container-fluid my-5">
		    <div class="container">
		        <div class="card col-md-8 offset-md-2 p-5 bg-light">

		            <?php flash('topic_created') ?>
		            <a href="/home/welcome">dashboard</a>

		            <h3 class="text-center text-info">Create topic inside category <?php echo $data['catName']->cat_name; ?></h3>

		            <form action="<?php echo URLROOT . 'topic/create' ?>" method="POST">

		                <div class="form-group">
		                    <label for="cat_name">Topic name</label>
		                    <input type="text" class="form-control <?php echo !empty($data['topic_name_err']) ? 'is-invalid' : ''; ?>" id="cat_name" name="topic_name">
		                    <span class="text-danger "><?php echo !empty($data['topic_name_err']) ? $data['topic_name_err'] : ''; ?></span>
		                </div>

		                <div class="row justify-content-between no-gutters">
		                    <a href="<?php echo URLROOT . 'home/welcome' ?>" class="text-primary">Register not yet ! go to register </a>
		                    <div>
		                        <button class="btn btn-outline-primary">Submit</button>
                                <?php cancle() ?>
		                    </div>
		                </div>
		            </form>
		        </div>
		    </div>

		</div>