<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<? $this->setFrameMode(true); ?>

<? /*<div class="sliderArea">
    <div id="sliderDots"></div>
    <div class="slider" id="homeSlider">
        <? foreach ($arResult['ITEMS'] as $item) { ?>
            <div>
                <div class="container">
                    <div class="sliderText">
                        <div class="sliderTitle">
                            <?= $item['NAME'] ?>
                        </div>
                        <p>
                            <?= $item['PREVIEW_TEXT'] ?>
                        </p>
                    </div>
                    <div class="sliderImage">
                        <img src="/i.php?src=<?= $item['PREVIEW_PICTURE']['SRC'] ?>&w=856&h=803" />
                    </div>
                </div>
            </div>
        <? } ?>
    </div>
</div>*/ ?>

<div id="carousel" class="carousel slide">
  <!-- Индикаторы слайдов -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>

  <!-- Слайды -->
  <div class="carousel-inner">
        <div class="item active">
          <img src="http://educationcareerarticles.com/wp-content/uploads/2014/07/Chef6.jpg" alt=" ">
          <div class="carousel-caption">
                <h3>Популяризация здоровой и полезной еды</h3>
                <p>В бешеном ритме современного человека зачастую не остается времени на приготовление хорошей и сбалансированной еды.</p>
          </div>
        </div>
        <div class="item">
            <img src="http://meownauts.com/wp-content/uploads/2015/11/mgid-uma-image-mtv.com-10719123.jpg" alt=" ">
            <div class="carousel-caption">
                <h3>Популяризация здоровой и полезной еды 2</h3>
                <p>В бешеном ритме современного человека зачастую не остается времени на приготовление хорошей и сбалансированной еды.</p>
            </div>
        </div>
        <div class="item">
            <img src="http://mypizzagrill.ru/wp-content/uploads/2014/12/Chef9.jpg" alt=" ">
            <div class="carousel-caption">
                <h3>Популяризация здоровой и полезной еды 3</h3>
                <p>В бешеном ритме современного человека зачастую не остается времени на приготовление хорошей и сбалансированной еды.</p>
            </div>
        </div>
  </div>

  <!-- Стрелки переключения слайдов -->
  <a href="#carousel" class="left carousel-control" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
  </a>
  <a href="#carousel" class="right carousel-control" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
  </a>
</div>

