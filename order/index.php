<? require ($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php") ?>
<? $APPLICATION->SetTitle("Оформление заказа - HolyBean"); ?>

<main>
    <section class="inner-page center">
        <h1>Оформление заказа</h1>
        <div class="center page-content clearfix">
            <div class="order_steps">
                <div class="order_step">
                    <span>1</span>
                    <p>Выберите <a href="/">Программу питания</a></p>
                </div>
                <div class="order_step">
                    <span>2</span>
                    <p>Выберите количество дней</p>
                </div>
                <div class="order_step">
                    <span>3</span>
                    <p>
                        Ознакомьтесь с 
                        <a href="/upload/contract.pdf" target="_blank">договором</a> 
                        и 
                        <a href="/upload/delivery.pdf" target="_blank">>условиями доставки</a>
                    </p>
                </div>
                <div class="order_step">
                    <span>4</span>
                    <p>Оплатите заказ</p>
                </div>
                <div class="order_step">
                    <span>5</span>
                    <p>Курьеры доставляют заказы ежедневно по утрам</p>
                </div>
                <div class="order_step">
                    <span>6</span>
                    <p>Если у вас возникли вопросы &mdash; <a href="#">свяжитесь с нами</a>!</p>
                </div>
            </div>
            <div class="p_order_delivery">
                <h2>Доставка</h2>
                <p>
                    <?  // Доставка.
                        $APPLICATION->IncludeComponent('bitrix:main.include', '', array(
                            'AREA_FILE_SHOW' => 'file',
                            'PATH' => SITE_TEMPLATE_PATH.'/include/data/delivery.php',
                            'EDIT_TEMPLATE' => 'html',
                        ));
                    ?>
                </p>
            </div>
            <div class="p_order_doc">
                <h2>Договор</h2>
                <a href="/upload/contract.pdf" class="button-white" target="_blank">
                    Скачать образец договора
                </a>
            </div>
        </div>
  </section>
</main>
 
<? require ($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php") ?>