<?php include 'comments-manager-header.tmp.php' ?>

<?php foreach($comments as $comment): ?>
    <?php include 'comment-item.tmp.php'; ?>
<?php endforeach; ?>