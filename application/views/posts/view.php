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
    <hr>
    <h3>Comments</h3>
    <?php if ($comments) : ?>
        <?php foreach ($comments as $comment) : ?>
            <div class="alert alert-dismissible alert-light">
                <h5><?php echo $comment['body']; ?> [by <strong><?php echo $comment['name']; ?></strong>]</h5>
            </div>
        <?php endforeach; ?>
    <?php else : ?>
        <p>No Comments To Display. Be the First to comment!</p>
    <?php endif; ?>
    <hr>
    <h3>Add Comment</h3>
    <?php echo validation_errors(); ?>
    <?php echo form_open('comments/create/' . $post['id']); ?>
    <div class="form-group">
        <label class="form-label mt-4">Name</label>
        <input type="text" name="name" class="form-control">
    </div>
    <div class="form-group">
        <label class="form-label mt-4">Email</label>
        <input type="text" name="email" class="form-control">
    </div>
    <div class="form-group">
        <label class="form-label mt-4">Body</label>
        <textarea name="body" class="form-control"></textarea>
    </div>
    <input type="hidden" name="slug" value="<?php echo $post['slug']; ?>">
    <button class="btn btn-primary mt-4" type="submit">Submit</button>
    </form>

</div>