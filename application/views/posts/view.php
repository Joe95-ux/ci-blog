<div class="wrapper-enclosure">
    <h2 class="page-heading"><?php echo $post['title']; ?></h2>
    <small class="post-date">Posted on: <?php echo $post['created_at']; ?></small>
    <img class="post-image" src="<?php echo site_url(); ?>assets/images/posts/<?php echo $post['post_image']; ?>">
    <div class="post-body">
        <?php echo $post['body']; ?>
    </div>
    <hr>


    <div class="d-flex">
        <a href="edit/<?php echo $post['slug']; ?>" class="btn btn-info me-sm-2">Edit</a>
        <?php echo form_open('/posts/delete/' . $post['id']); ?>
        <input type="submit" value="Delete" class="btn btn-danger">
        </form>

    </div>

</div>