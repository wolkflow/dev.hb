            <footer class="siteFooter">
				<div class="bg2">
				</div>
                <div class="container">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12">
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12 bg1">	
									<!--<div class="bg1">
									</div>-->
									<div class="row">
										
										<div class="col-lg-9 col-md-9 col-sm-9 foo1">
											<div class="menu footerMenu foo2">
												<ul>
													<li><a href="/about/">о нас</a></li>
													<li><a href="/#programs">программы питания</a></li>
													<li><a href="/catalog/">holymarket</a></li>
													<li><a href="#" class="popup-opener" data-popup="#basket-popup">корзина</a></li>
												</ul>
											</div>
										</div>
										<div class="col-lg-3 col-md-3 col-sm-3">
											<div class="footer-contacts">
												<div class="footer-contacts__tel">
													<?  // Телефон.
														$APPLICATION->IncludeComponent('bitrix:main.include', '', array(
															'AREA_FILE_SHOW' => 'file',
															'PATH' => SITE_TEMPLATE_PATH.'/include/data/phone.php',
															'EDIT_TEMPLATE' => 'html',
														));
													?>
												</div>
												<div class="footer-contacts__soc hidden-xs">
													<a href="#">
														<i class="icon-12 icon-inst"></i>
													</a>
													<a href="#">
														<i class="icon-12 icon-fb"></i>
													</a>
												</div>
											</div>
										</div>
									</div>
									<div class="row footer-top">
										<div class="col-lg-3 col-md-3 col-sm-3 foo1">
											<div class="footer-info__copyright foo2">
												<span>
													<?  // Copyright.
														$APPLICATION->IncludeComponent('bitrix:main.include', '', array(
															'AREA_FILE_SHOW' => 'file',
															'PATH' => SITE_TEMPLATE_PATH.'/include/data/copyright.php',
															'EDIT_TEMPLATE' => 'html',
														));
													?>
												</span>
												<span>
													<?  // Разработка.
														$APPLICATION->IncludeComponent('bitrix:main.include', '', array(
															'AREA_FILE_SHOW' => 'file',
															'PATH' => SITE_TEMPLATE_PATH.'/include/data/development.php',
															'EDIT_TEMPLATE' => 'html',
														));
													?>
												</span>
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-6">
											<div class="footer-info__copyright footer-info2">
												<span>
												<?  // Оферта.
													$APPLICATION->IncludeComponent('bitrix:main.include', '', array(
														'AREA_FILE_SHOW' => 'file',
														'PATH' => SITE_TEMPLATE_PATH.'/include/data/offer.php',
														'EDIT_TEMPLATE' => 'html',
													));
												?>
												</span>
											</div>
										</div>
										<div class="col-lg-3 col-md-3 col-sm-3">
											<div class="footer-info__copyright footer-info3">
												<span>
												<?  // E-mail.
													$APPLICATION->IncludeComponent('bitrix:main.include', '', array(
														'AREA_FILE_SHOW' => 'file',
														'PATH' => SITE_TEMPLATE_PATH.'/include/data/email.php',
														'EDIT_TEMPLATE' => 'html',
													));
												?>
												</span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
						
					
			
			<button class="button popup-opener" data-popup="#callback-popup">обратный звонок</button>
                    <button class="button popup-opener" data-popup="#basket-popup">корзина</button>
			
		
            
            <script src="<?= SITE_TEMPLATE_PATH ?>/js/slick.min.js"></script>
            <script src="<?= SITE_TEMPLATE_PATH ?>/js/script.js"></script>
        
    </body>
</html>