$(document).ready(function() {
    $('.js-buy').on('click', function() {
        var $that = $(this);
       
        $.ajax({
            url: '/remote/',
            data: {'action': 'add-to-cart', 'product': $that.data('product'), 'type': 'product'},
            dataType: 'json',
            type: 'post',
            success: function(response) {
                if (response.status) {
                     $that.transfer({
                        to: '#js-basket-button-id',
                        duration: 600
                    }, function() {
                        RefreshBasket();
                    });
                }
            }
        });
    });
    
    
    $('.js-min-image').on('click', function() {
        var $that = $(this);
        var $wrap = $that.closest('.js-images');
        var $main = $wrap.find('.js-big-image');
        
        $main.prop('src', $that.data('src'));
    });
});