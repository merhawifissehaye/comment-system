<div id="notification">
    <?php if(isset($message)): ?>
        <p class="alert alert-success"><?php echo $message; ?></p>
    <?php endif; ?>
</div>


<?php if($route == 'comment'): ?>
<?php include 'manager.tmp.php' ?>
<?php endif; ?>

<?php foreach($comments as $comment):
    include 'single.tmp.php'; ?>
<?php endforeach; ?>