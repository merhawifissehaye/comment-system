<?php
$approved = $comment->status == 'APPROVED';
$spammed = $comment->status == 'SPAM';
?>
<div class="clearfix comment-item <?php if($approved) echo 'approved'; if($spammed) echo 'spammed'; ?>">
    <div class="header">
        <input type="checkbox" id="comment-item-checkbox-<?php echo $comment->id ?>" name="comment-item" value="<?php echo $comment->id ?>" class="comment-item-checkbox pull-left" />
        <div class="comment-content">
            <div class="avatar pull-left">
                <img src="<?php echo $comment->user->avatar_url ?>" width="60" alt="" />
            </div>
            <div class="text-content pull-left">
                <div class="title">
                </div>
                <p class="title"><?php echo $comment->comment ?></p>
                <div class="buttons">
                    <?php if(!$approved): ?>
                        <a href="<?php echo '/comment/approve/' . $comment->id ?>" class="approve-button-inside-comment button-inside-comment">
                            <span class="text-primary"><i class="fa fa-check"></i> Approve</span>
                        </a>
                    <?php endif; ?>
                    <?php if(!$spammed): ?>
                    <a href="<?php echo '/comment/spam/' . $comment->id ?>" class="spam-button-inside-comment button-inside-comment">
                        <span class="text-primary">
                            <i class="fa fa-ban"></i> Spam
                        </span>
                    </a>
                    <?php endif; ?>
                    <a href="<?php echo '/comment/delete/' . $comment->id ?>" class="delete-button-inside-comment button-inside-comment">
                        <span class="text-primary">
                            <i class="fa fa-trash"></i> Delete
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>