jQuery(function($) {

    $('.girls-widget').on('click', '#ajax_rand_girl', function(event) {
        var data = {
            'action': 'get_girl',
            'post_id': parseInt($('.girls-widget .type-girls').prop('id')),
        };

        $.ajax({

            url: GirlsRandomAjax.ajaxurl,
            data: data,
            type: 'POST',
            success: function(data) {

                if (data) {
                    $('.girls-widget .girls-post-wrapper').html('');    
                    $('.girls-widget .girls-post-wrapper').append(data); 
                } 
            }
        });
    });
});
