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

        var updateScreen = function(options) {

            var message = options.message;
            var ids = options.ids;
            var addClass = options.addClass;
            var removeClass = options.removeClass;
            var remove = options.remove || false;
            var $notification = $('#notification').find('.alert');

            ids = ids.map(function(i) { return '#comment-item-checkbox-' + i });
            $('.spam-button-inside-comment').show();
            $('.comment-item').removeClass('approved').removeClass('spammed');
            var $boxesSelector = $(ids.join(',')).closest('.comment-item');

            if($notification.length < 1) {
                $notification = $('<p class="alert alert-success">' + message + '</p>');
                $notification.appendTo('#notification');
            } else {
                $notification.text(message);
            }

            if(remove) {
                console.log('removing item');
                $boxesSelector.remove();
                return;
            }

            $boxesSelector.addClass(addClass.replace('.', '')).find(removeClass).hide();
        };

        $('#manage-approve').on('click', function() {
            // send ajax request to approve selected items
            console.log('Approving items');
            var checkedIds = new Array();
            $('.comment-item-checkbox').each(function(i,v) {
                if($(v).prop('checked')) {
                    checkedIds.push($(v).val());
                }
            });

            var url = '/comment/approveJson/' + checkedIds.join(',');
            $.ajax({
                type: 'POST',
                url: url,
                dataType: 'json',
                success: function(data) {
                    updateScreen({
                        message: data['message'],
                        ids: data['ids'],
                        addClass: 'approved',
                        removeClass: '.approve-button-inside-comment'
                    });
                }
            });
        });

        $('#manage-spam').on('click', function() {
            // send ajax request to approve selected items
            var checkedIds = new Array();
            $('.comment-item-checkbox').each(function(i,v) {
                if($(v).prop('checked')) {
                    checkedIds.push($(v).val());
                }
            });

            var url = '/comment/spamJson/' + checkedIds.join(',');
            $.ajax({
                type: 'POST',
                url: url,
                dataType: 'json',
                success: function(data) {
                    updateScreen({
                        message: data['message'],
                        ids: data['ids'],
                        addClass: 'spammed',
                        removeClass: '.spam-button-inside-comment'
                    });
                }
            });
        });

        $('#manage-delete').on('click', function() {
            // send ajax request to approve selected items
            var checkedIds = new Array();
            $('.comment-item-checkbox').each(function(i,v) {
                if($(v).prop('checked')) {
                    checkedIds.push($(v).val());
                }
            });

            var url = '/comment/deleteJson/' + checkedIds.join(',');
            $.ajax({
                type: 'POST',
                url: url,
                dataType: 'json',
                success: function(data) {
                    updateScreen({
                        message: data['message'],
                        ids: data['ids'],
                        removeClass: '.delete-button-inside-comment',
                        remove: true
                    });
                }
            });
        });
    })
})(jQuery);