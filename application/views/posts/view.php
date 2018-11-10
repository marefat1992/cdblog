<h2><?php echo $post['title']; ?></h2>
<small class="post-date">posted on: <?php echo $post['created_at']; ?></small><br><!--date of post-->
<img class="thumbnail" src="<?php echo site_url(); ?>assets/images/posts/<?php echo $post['post_image']; ?>">
<div class="post-body">
	<?php echo $post['body']; ?>
</div>
<?php if($this->session->userdata('user_id') == $post['user_id']) : ?>
<hr>
<?php echo form_open('/posts/delete/'.$post['id']); ?>
<input class="btn btn-primary" type="submit" value="delete">
</form>
<?php endif; ?>
<a class="btn btn-danger" href="<?php echo base_url(); ?>posts/edit/<?php echo $post['slug']; ?>">Edit</a>
<hr>
<h3>Comments</h3>
<?php if($comments) : ?>
	<?php foreach($comments as $comment) : ?>
	<div class="well">
		<h5><?php echo $comment['body']; ?> [by <strong><?php echo $comment['name']; ?></strong>]</h5>
	</div>
		<?php endforeach; ?>
	<?php else : ?>
		<p>no comments to display</p>
		<?php endif; ?>
		<hr>
<h3>Add comments</h3>
<?php echo validation_errors(); ?> 
<?php echo form_open('comments/create/'.$post['id']); ?>
<div class="form-group">
	<label>Name</label>
	<input type="text" name="name" class="form-control">
</div>
<div class="form-group">
	<label>Email</label>
	<input type="email" name="email" class="form-control">
</div>
<div class="form-group">
	<label>body</label>
	<textarea name="body" class="form-control"></textarea>
</div>
<input type="hidden" name="slug" value="<?php echo $post['slug']; ?>">
<button class="btn btn-primary" type="submit">Submit</button>