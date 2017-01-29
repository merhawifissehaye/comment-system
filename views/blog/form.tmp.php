<form action="/blog/create" method="post">
    <div class="form-group clearfix">
        <label for="title">Title of the blog</label>
        <input type="text" id="title" name="title" class="form-control" placeholder="Enter the title of the blog" /><br>
        <label for="title">Contents of the blog</label>
        <textarea class="form-control" id="commentArea" rows="15" name="content" placeholder="Write your comments here"></textarea><br>
        <button class="btn btn-primary" type="submit" name="create_blog_submitted">Post</button>
    </div>
</form>