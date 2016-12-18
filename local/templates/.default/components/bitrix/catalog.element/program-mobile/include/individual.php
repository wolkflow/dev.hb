<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>


<script>
    $(document).ready(function() {
        $('#js-buy-button-id').on('click', function() {
            var $that = $(this);
            
            $.ajax({
                url: '/remote/',
                data: {'action': 'add-to-cart', 'product': <?= $arResult['ID'] ?>, 'type': 'program-individual'},
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
    });
</script>
<div class="container main-unit">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <h2>Условия покупки</h2>
            <div class="bl_purchase_terms_cont row">
                <div class="bl_purchase_terms_btn hidden-xs">
                    <a id="js-buy-button-id" href="javascript:void(0)" class="button">Купить</a>
                </div>
                <div class="bl_purchase_terms_cont_tx col-xs-12">
                    <p>
                        <?= $arResult['DETAIL_TEXT'] ?>
                    </p>
                </div>
                 <div class="bl_purchase_terms_btn col-xs-12 hidden-sm hidden-md hidden-lg but1">
                    <a id="js-buy-button-id" href="javascript:void(0)" class="button">Купить</a>
                </div>
            </div>
        </div>
    </div>
</div>