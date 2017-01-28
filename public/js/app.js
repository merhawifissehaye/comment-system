// app.js

(function($) {
    $(document).ready(function() {
        $('.comment-item-checkbox').on('change', function(e) {
            var $parentCommentBox = $(this).closest('.comment-item');
            if(this.checked) {
                console.log();
                $parentCommentBox.addClass('selected');
            } else {
                console.log($(this).closest('.comment-item'));
                $parentCommentBox.removeClass('selected');
            }
        });
    })
})(jQuery);