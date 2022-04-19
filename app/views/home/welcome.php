



<div class="row">
  <div class="col-md-12">
  <div class="row">
<?php flash('succ') ?>
<form action="<?php echo URLROOT . 'home/welcome' ?>" method="POST">

<div class="col-md-3">
        <label for="" class="form-label">Users Topic</label>
        <select multiple class="form-select" name="topic" id="">
            <option  disabled>Chodse topic from list</option>
            <?php foreach ($data['usersTopic'] as $topic) : ?>
                <option  value="<?php echo $topic->id ?>"> <?php echo $topic->topic_name ?></option>
            <?php endforeach; ?>
        </select>
        <span class="text-danger "><?php echo !empty($data['topic_err']) ? $data['topic_err'] : ''; ?></span>
</div>


<div class="col-md-3">    
        <label for="" class="form-label">Users</label>
        <select multiple class="form-select" name="user" id="">
            <option  disabled>Chodse user from list</option>
            <?php foreach ($data['getAllUsers'] as $users) : ?>
                <option value="<?php echo $users->id ?>"> <?php echo $users->name ?></option>
            <?php endforeach; ?>
        </select>   
        <span class="text-danger "><?php echo !empty($data['user_err']) ? $data['user_err'] : ''; ?></span>
</div>
<button  class="btn btn-primary btn-lg btn-block" >submit</button>
</form>


</div>

</div>
  </div>
