<div class="clearfix comment-item">
    <div class="header">
        <div class="comment-content">
            <div class="avatar pull-left">
                <img src="<?php echo $comment->user->avatar_url ?>" width="60" alt="" />
            </div>
            <div class="text-content pull-left">
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