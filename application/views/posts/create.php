<h2><?= $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open_multipart('posts/create'); ?>
<div class="form-group">
    <label class="form-label mt-4">Title</label>
    <input type="text" class="form-control" name="title" placeholder="Add Title">
</div>
<div class="form-group">
    <label class="form-label mt-4">Body</label>
    <textarea id="editor1" class="form-control" name="body" placeholder="Add Body"></textarea>
</div>
<div class="form-group">
    <label class="form-label mt-4">Category</label>
    <select name="category_id" class="form-select">
        <?php foreach ($categories as $category) : ?>
            <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
        <?php endforeach; ?>
    </select>
</div>

<div class="form-group">
    <label for="formFile" class="form-label mt-4">Upload Image</label>
    <input class="form-control" type="file" id="formFile" name="userfile" size="20">
</div>
<button type="submit" class="btn btn-primary mt-4">Submit</button>
</form>