<h2> <?= $title ?> </h2>
<?php foreach ($posts as $post) : ?>
    <div class="row mt-4">
        <div class="col-md-3">
            <img class="post-thumb" src="<?php echo site_url(); ?>assets/images/posts/<?php echo $post['post_image']; ?>">
        </div>
        <div class="col-md-9">
            <h3 class="post-title"><?php echo $post['title']; ?></h3>
            <small class="post-date">Posted on: <?php echo $post['created_at']; ?> in <strong><?php echo $post['name']; ?></strong></small>

             <p class="post-body"><?php echo word_limiter($post['body'], 60); ?></p>
            <p><a class="btn btn-info mt-4" href="<?php echo site_url('/posts/' . $post['slug']); ?>">Read More</a></p>
        </div>
    </div>
<?php endforeach; ?>
<div class="pagination-links">
    <?php echo $this->pagination->create_links(); ?>
</div>
