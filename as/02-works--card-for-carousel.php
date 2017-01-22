<?php
$FRT_ROOT = FRT_ROOT;

$frtCardWork = <<<FRT_CARD_WORK
			<article  class="frt-card frt-card--fixed-size">
				<figure class="dg-img-box">
					<a class="dg-link--wrap dg-100">
						<img src="${FRT_ROOT}img/works/works-1.png" alt="Кухни. Классические и современные кухни на заказ." class="dg-img frt-img">
						<figcaption class="frt-figcaption">
							<h3 class="dg-title frt-title">Кухни</h3>
							<p class="frt-descr">Классические и современные<br>кухни на заказ.<br><br><span style="color:#aaa">— Повыделывайся мне ещё!</span></p>
						</figcaption>
					</a>
				</figure>
			</article>

FRT_CARD_WORK;
?>
<section class="frt-section-materials">
	<div class="dg-w">
		<div class="dg-ww frt-ww--cards">
			<h2 class="dg-title frt-title">Наши <span class="frt-title__underline">работы</span></h2>
			<ul class="dg-set dg-set--flexbox  dg-flexbox dg-flexbox--JC-center">
				<li class="dg-li">
<?=$frtCardWork?>
				<li class="dg-li">
<?=$frtCardWork?>
				<li class="dg-li">
<?=$frtCardWork?>
				<li class="dg-li">
<?=$frtCardWork?>
				</li>
			</ul>
		</div>
	</div>
</section>




<section class="frt-section-carousel-works dg-P-relative">
	<h2 class="dg-title frt-title">Другие <span class="frt-title__underline">проекты</span></h2>
	<div id="frt-carousel-works" class="frt-carousel">
		<div class="frt-carousel__slide">
<?=$frtCardWork?>
		</div>
		<div class="frt-carousel__slide">
<?=$frtCardWork?>
		</div>
		<div class="frt-carousel__slide">
<?=$frtCardWork?>
		</div>
		<div class="frt-carousel__slide">
<?=$frtCardWork?>
		</div>
	</div>
</section>
