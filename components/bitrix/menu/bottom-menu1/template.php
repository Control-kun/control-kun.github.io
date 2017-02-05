<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
if (!empty($arResult)):
?>
	<section class="frt-nav-mobile-panel-substratum">
		<nav class="frt-nav-mobile-panel">
			<ul class="dg-100 dg-set dg-set--flexbox  dg-flexbox dg-flexbox--FW-nowrap dg-flexbox--JC-stretch">
				<li class="dg-li frt-nav-mobile-panel__button-box">
					<a href="/" class="frt-nav-mobile-panel__button dg-button dg-link--wrap dg-100 dg-flexbox">
						<div class="frt-nav-mobile-panel__button-inside">
							<i class="dg-ico frt-ico frt-ico--back"></i>
							<span class="dg-txt frt-txt">Вернуться</span>
						</div>
					</a>
				<li class="dg-li frt-nav-mobile-panel__button-box">
					<a href="#" class="frt-nav-mobile-panel__button dg-button dg-link--wrap dg-100 dg-flexbox">
						<div class="frt-nav-mobile-panel__button-inside">
							<i class="dg-ico frt-ico frt-ico--call"></i>
							<span class="dg-txt frt-txt">Заказать звонок</span>
						</div>
					</a>
				<li class="dg-li frt-nav-mobile-panel__button-box frt-nav-mobile-panel__button-box--menu">
					<input id="frt-nav-mobile-menu__switch" type="checkbox" hidden>
					<label for="frt-nav-mobile-menu__switch" class="frt-nav-mobile-panel__button dg-button dg-link--wrap dg-100 dg-flexbox" title="Показать навигационное меню">
						<div class="frt-nav-mobile-panel__button-inside">
							<i class="dg-ico frt-ico frt-ico--menu"></i>
						</div>
					</label>
					<div class="frt-nav-mobile-menu__box">
						<a href="<?=$dgData['NAV_HOME']?>" class="dg-link--wrap frt-nav-mobile-menu__logo">
							<img class="dg-img dg-center-clamp" src="<?=$dgData['SRC_IMG']?>owner/fortunum-logo.png" alt="«Fortunum»: корпусная мебель на заказ в Санкт-Петербурге.">
						</a>
						<ul class="frt-nav-mobile-menu dg-OxH dg-OyA">
<?
						foreach($arResult as $arItem):
							if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1)
								continue;
							if($arItem["SELECTED"]):
?>
							<li class="dg-li">
								<a href="<?=$arItem["LINK"]?>" class="dg-button dg-TAL_i dg-link--wrap"><?=$arItem["TEXT"]?></a>
<?
							else:
?>
							<li class="dg-li">
								<a href="<?=$arItem["LINK"]?>" class="dg-button dg-TAL_i dg-link--wrap"><?=$arItem["TEXT"]?></a>
							<?
							endif;
						endforeach;
?>

							<li class="dg-li frt-nav-mobile-menu__li--extra">
								<a href="" class="dg-button dg-TAL_i dg-link--wrap frt-nav-mobile-menu__link--extra">Политика конфиденциальности</a>
						</ul>
					</div>
			</ul>
		</nav>
	</section>
<?endif;
