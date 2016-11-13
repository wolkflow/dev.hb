$(document).ready(function() {
    $('.js-buy').on('click', function(event) {
       event.preventDefault();
       
       var $that = $(this);
       
       $.ajax({
            url: '/remote/',
            data: {'action': 'add-to-cart', 'product': $that.data('product'), 'type': 'product'},
            dataType: 'json',
            type: 'post',
            success: function(response) {
                if (response.status) {
                    if ($('#js-basket-button-id').length) {
                        $that.transfer({
                            to: '#js-basket-button-id',
                            duration: 600
                        }, function() {
                            RefreshBasket();
                        });
                    }
                }
            }
        });
        return false;
    });
});