$(document).ready(function() {
    $('.js-order-repeat').on('click', function() {
        var oid = $(this).data('oid');
        console.log(oid);
        $.ajax({
            url: '/remote/',
            data: {'action': 'repeat-order', 'oid': oid},
            dataType: 'json',
            type: 'post',
            success: function(response) {
                if (response.status) {
                    getRemoteHTML('basket', '#js-popup-content');

                    $('body').addClass('popup-opened');
                    $('#popup').addClass('is-active');
                } else {
                    alert(response.message);
                }
            }
        });
    });
});