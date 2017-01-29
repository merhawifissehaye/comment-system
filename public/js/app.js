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

        // search as you type on comments page
        $('#search-comments').on('keyup', function($e) {
            $q = $(this).val();
            $('.comment-item p').each(function(i,v) {
                $item = $(v).closest('.comment-item')
                if($(v).text().toLowerCase().search($q.toLowerCase()) == -1) {
                    $item.hide();
                } else {
                    /*$regex = new RegExp('(' + $q + ')', 'i');
                    $(v).text($(v).text().replace($regex, '<strong>$1</strong>'));*/
                    $item.show();
                }
            });
        })
        $('#comment-search-form').on('submit', function($e) {
            $e.preventDefault();
        });

        // select all on comment manager
        $('#select-all').on('change', function($e) {
            if($(this).prop('checked')) {
                $('.comment-item-checkbox').prop('checked', true);
            } else {
                $('.comment-item-checkbox').prop('checked', false);
            }
        });

        $('#manage-approve').on('click', function() {
            // send ajax request to approve selected items
            console.log('Approving items');
            var checkedIds = new Array();
            $('.comment-item-checkbox').each(function(i,v) {
                if($(v).prop('checked')) {
                    checkedIds.push($(v).val());
                }
            });
            console.log(checkedIds);

            $.ajax({
                type: 'GET',
                url: '/comment/setStatusByAjax',
                data: {
                    'text': 'Hello World'
                },
                dataType: 'json'
            }).then(function(d, e) {
                console.log(e);
            });
        });
        $('#manage-spam').on('click', function() {
            // send ajax request to approve selected items
            console.log('Spamming items');
            var checkedIds = new Array();
            $('.comment-item-checkbox').each(function(i,v) {
                if($(v).prop('checked')) {
                    checkedIds.push($(v).val());
                }
            });
        });
        $('#manage-delete').on('click', function() {
            // send ajax request to approve selected items
            console.log('Deleting items');
            var checkedIds = new Array();
            $('.comment-item-checkbox').each(function(i,v) {
                if($(v).prop('checked')) {
                    checkedIds.push($(v).val());
                }
            });
        });
    })
})(jQuery);