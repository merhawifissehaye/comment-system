<div class="clearfix comment-item">
    <div class="header">
        <input type="checkbox" id="comment-item-checkbox-<?php echo $comment->id ?>" class="comment-item-checkbox pull-left" />
<!--        <h1><label for="comment-item-checkbox---><?php //echo $blog->id ?><!--">--><?php //echo $blog->content ?><!--</label></h1>-->
        <div class="comment-content">
            <div class="avatar pull-left">
                <img src="<?php echo $comment->user->avatar_url ?>" width="60" alt="" />
            </div>
            <div class="text-content pull-left">
                <div class="title">
                    <h3><label for="comment-item-checkbox-<?php echo $comment->id ?>"><?php echo $comment->blog->title ?> . <span class="text-muted">3 days ago</span></label></h3>
                </div>
                <p><?php echo $comment->comment ?></p>
                <div class="buttons">
                    <a href="#"><i class="fa fa-check"></i> Approve</a>
                    <a href="#"><i class="fa fa-ban"></i> Spam</a>
                    <a href="#"><i class="fa fa-trash"></i> Delete</a>
                </div>
            </div>
        </div>
    </div>
</div>