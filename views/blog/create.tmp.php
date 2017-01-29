<div class="container">
    <?php if(isset($error)): ?>
        <p class="alert alert-danger"><?php echo $error ?></p>
    <?php endif; ?>
    <?php include('form.tmp.php'); ?>
</div>