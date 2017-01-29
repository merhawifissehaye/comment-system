<label for="blod_id">On which blog would you like to comment?</label>
<form action="/comment/create/" method="post" class="comment-form">
    <select name="blog_id" id="blod_id" class="form-control">
        <?php foreach($blogs as $blog): ?>
        <option value="<?php echo $blog->id ?>"><?php echo $blog->title; ?></option>
        <?php endforeach; ?>
    </select>
    <div class="form-group clearfix">
        <textarea class="form-control" id="commentArea" name="comment" placeholder="Write your comments here"></textarea>
        <div class="buttons clearfix">
            <p class="pull-left">Please don't enter bad words like <strong>Buy Viagra</strong></p>
            <button class="pull-right btn btn-primary">Post</button>
        </div>
    </div>
</form>