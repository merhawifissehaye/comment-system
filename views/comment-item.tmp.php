<div class="clearfix comment-item">
    <div class="header">
        <input type="checkbox" id="comment-item-checkbox-<?php echo $comment->id ?>" class="comment-item-checkbox pull-left" />
        <h1><label for="comment-item-checkbox-<?php echo $comment->id ?>"><?php echo $comment->content ?></label></h1>
    </div>
    <div class="comment-content">
        <div class="avatar pull-left">
            <img src="https://image.flaticon.com/icons/svg/138/138662.svg" width="60" alt="" />
        </div>
        <div class="text-content pull-left">
            <div class="title">
                <h3>Earthlings</h3> . <span>3 days ago</span>
            </div>
            <p>Make us proud</p>
            <div class="buttons">
                <a href="#"><i class="fa fa-check"></i> Approve</a>
                <a href="#"><i class="fa fa-ban"></i> Spam</a>
                <a href="#"><i class="fa fa-trash"></i> Delete</a>
            </div>
        </div>
    </div>
</div>