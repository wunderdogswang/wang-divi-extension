// This script is loaded both on the frontend page and in the Visual Builder.

jQuery(function($) {
    $('.team-avatar').on('click', function(){
        const teamPostId = $(this).attr('data-post-id');
        const nonce = $('.team-popup').attr('data-nonce');
        console.log(nonce);

        $.ajax({
            type: 'post',
            dataType: 'json',
            url: et_pb_custom.ajaxurl,
            data: {
              action: 'get_teams',
              nonce: nonce,
              teamPostId: teamPostId,
            },
            success: function (response) {
                $('.team-popup-inner').html(response.html);
                $('.team-popup').removeClass('hide');
            }
        });
    });

    $('.team-category').on('click', function(){
        const termId = $(this).attr('data-term-id');

        alert(termId);
    });
});
