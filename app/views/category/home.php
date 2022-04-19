<div class="container-fluid">
    <div class="container my-3">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Categories:</h1>
                <?php foreach ($data['cat'] as $cat) : ?>
                    <div class="card mb-3">
                        <div class="card-header bg-info text-dark">
                            <a href="<?php echo URLROOT . 'topic/home/' . $cat->id; ?>"><?php echo $cat->cat_name; ?></a>
                        </div>
                        <div class="card-block p-2">
                            <?php echo $cat->cat_description; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>