<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>


<script>
    $(document).ready(function() {
        $('#js-buy-button-id').on('click', function() {
            $.ajax({
                url: '/remote/',
                data: {'action': 'add-to-cart', 'product': <?= $arResult['ID'] ?>, 'type': 'program-individual'},
                dataType: 'json',
                type: 'post',
                success: function(response) {
                    if (response.status) {
                        
                    }
                }
            });
        });
    });
</script>

<div class="bl_purchase_terms">
    <h2>Условия покупки</h2>
    <div class="bl_purchase_terms_cont">
        <div class="bl_purchase_terms_btn">
            <a id="js-buy-button-id" href="javascipt:void(0)" class="button">Купить</a>
        </div>
        <div class="bl_purchase_terms_cont_tx">
            <p>
                <?= $arResult['DETAIL_TEXT'] ?>
            </p>
        </div>
    </div>
</div>