$(document).ready(function() {
    $('.js-buy').on('click', function() {
        var product = $(this).data('product');
       
        $.ajax({
            url: '/remote/',
            data: {'action': 'add-to-cart', 'product': product, 'type': 'product'},
            dataType: 'json',
            type: 'post',
            success: function(response) {
                if (response.status) {
                    
                }
            }
        });
    });
});