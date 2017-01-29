<h3><?php echo $blog->title ?></h3>
<?php foreach($blog->comments as $comment): ?>
    <?php include BASE_DIR . '/views/comment/single.tmp.php' ?>
<?php endforeach; ?>
