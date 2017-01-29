<?php if(isset($message)): ?>
    <p class="alert alert-success"><?php echo $message; ?></p>
<?php endif; ?>
<?php foreach($blogs as $blog): ?>
    <?php include('single.tmp.php') ?>
<?php endforeach; ?>
<a href="/blog/create" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Create blog</a>
