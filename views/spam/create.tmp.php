<?php if(isset($error)): ?>
    <p class="alert alert-danger"><?php echo $error ?></p>
<?php endif ?>
<?php if(isset($message)): ?>
    <p class="alert alert-success"><?php echo $message ?></p>
<?php endif ?>
<?php foreach($spams as $spam): ?>
    <p><?php echo $spam ?></p>
<?php endforeach; ?>
<form method="post" action="/comment/createspam" class="col-md-6">
    <div class="form-group">
        <label for="word">Enter spam word</label>
        <input class="form-control" type="text" id="word" name="word" placeholder="Enter spam word" /><br>
        <button type="submit" name="create_spam_submitted" class="btn btn-primary btn-sm">Submit</button>
    </div>
</form>