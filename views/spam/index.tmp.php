<?php

foreach($comments as $comment):
    include BASE_DIR . 'views/comment/single.tmp.php';
endforeach;

?>
<br>
<a href="/comment/createspam" class="but btn-sm btn-primary"><i class="fa fa-plus"></i> Add spam word</a>
