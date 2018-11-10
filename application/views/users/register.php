<?php echo validation_errors(); ?>
<?php echo form_open('users/register'); ?>
<div class="row">
	<div class="col-md-4 col-md-offset-4">
		<h2 class="text-center"><?= $title; ?></h2>
  <div class="form_group">
	  <label>Name</label>
	  <input type="text" class="form-control" name="name" placeholder="Name">
  </div>
  <div class="form_group">
	  <label>zipcode</label>
	  <input type="text" class="form-control" name="zipcode" placeholder="ZipCode">
  </div>
  <div class="form_group">
	 <label>email</label>
	 <input type="email" class="form-control" name="email" placeholder="email">
  </div>
  <div class="form_group">
	  <label>username</label>
	  <input type="text" class="form-control" name="username" placeholder="username">
  </div>
  <div class="form_group">
	  <label>password</label>
	  <input type="password" class="form-control" name="password" placeholder="password">
  </div>
<div class="form_group">
	<label>confirm pass</label>
	<input type="password" class="form-control" name="password2" placeholder="confirm password">
</div>
<button type="submit" class="btn btn-primary btn-block">Submit</button>
</div>
</div>
<?php echo form_close(); ?>