<? require ($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php") ?>
<? $APPLICATION->SetTitle("Оформление заказа - HolyBean"); ?>

<main>
    <div class="container">
		<h1>Оформление заказа</h1>
	</div>
	<div class="container main-unit">
		<div clas="row">
			<div class="center page-content clearfix ots1">
				<div class="order_steps">
					<div class="order_step">
						<span class="number animated slideInLeft">1</span>
						<p class="animated slideInRight">Выберите <a href="/#programs">Программу питания</a></p>
					</div>
					<div class="order_step">
						<span class="number animated slideInLeft">2</span>
						<p class="animated slideInRight">Выберите количество дней</p>
					</div>
					<div class="order_step">
						<span class="number animated slideInLeft">3</span>
						<p class="animated slideInRight">
							Ознакомьтесь с 
							<a href="/upload/contract.pdf" target="_blank">договором</a> 
							и 
							<a href="/upload/delivery.pdf" target="_blank">>условиями доставки</a>
						</p>
					</div>
					<div class="order_step">
						<span class="number animated slideInLeft">4</span>
						<p class="animated slideInRight">Оплатите заказ</p>
					</div>
					<div class="order_step">
						<span class="number animated slideInLeft">5</span>
						<p class="animated slideInRight">Курьеры доставляют заказы ежедневно по утрам</p>
					</div>
					<div class="order_step">
						<span class="number animated slideInLeft">6</span>
						<p class="animated slideInRight">
                            Если у вас возникли вопросы &mdash; 
                            <a href="javascript:void(0)" class="popup-opener" data-popup="#callback-popup">свяжитесь с нами</a>!
                        </p>
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
        </div>
  </div>
</main>
 
<? require ($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php") ?>

