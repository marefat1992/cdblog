<h2><?=$title; ?></h2>
<?php echo validation_errors(); ?>
<?php echo form_open_multipart('categories/create'); ?>
<div class="form-group">
    <label>Name</label>
    <input type="text" class="form-control" name="name" placeholder="Add Title">
    <button type="submit" class="btn btn-default">submit</button>
</div>
</form>