$(document).ready(function() {
    
    // Изменение количества.
    $(document).on('click', '.js-quantity-change', function() {
        var $wrap = $(this).closest('.js-quantity-wrap');
        var basket = $wrap.data('basket');
        var quantity = $wrap.find('input').val();
        
        $.ajax({
            url: '/remote/',
            type: 'post',
            data: {'action': 'quantity-cart', 'basket': basket, 'quantity': parseInt(quantity)},
            dataType: 'json',
            success: function(response) {
                if (response.status) {
                    $('#js-basket-total-price-id').html(response.data['total']);
                }
            }
        });
    });
   
    // Удаление товара.
    $(document).on('click', '.js-basket-remove', function() {
        var $that = $(this);
        var $wrap = $that.closest('.js-quantity-wrap');
        var basket = $that.data('basket');

        $.ajax({
            url: '/remote/',
            type: 'post',
            data: {'action': 'remove-from-cart', 'basket': basket},
            dataType: 'json',
            success: function(response) {
                if (response.status) {
                    $that.closest('.basket-item').remove();
                    
                    if ($('#js-baskets-id .basket-item').length <= 0) {
                        $('#js-basket-wrap-id').append('<p>Корзина пуста</p>');
                    } else {
                        $('#js-basket-total-price-id').html(response.data['total']);
                    }
                }
            }
        });
    });
});