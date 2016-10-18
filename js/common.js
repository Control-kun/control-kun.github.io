$(function() {

	//SVG Fallback
	if(!Modernizr.svg) {
		$("img[src*='svg']").attr("src", function() {
			return $(this).attr("src").replace(".svg", ".png");
		});
	};


	$("img, a").on("dragstart", function(event) { event.preventDefault(); });

});
$( document ).ready(function() {
	$('#production-slider,#instagramm-slider').slick({
		centerMode: true,
		dots:true,
		centerPadding: '0px',
		slidesToShow: 1,
		responsive: [
			{
				breakpoint: 768,
				settings: {
					arrows: true,
					centerMode: true,
					centerPadding: '0px',
					slidesToShow: 1
				}
			},
			{
				breakpoint: 400,
				settings: {
					arrows: true,
					centerMode: false,
					centerPadding: '0px',
					slidesToShow: 1,
					infinite:true,
					dots: false
				}
			},
			{
				breakpoint: 375,
				settings: {
					arrows: true,
					centerMode: false,
					centerPadding: '0px',
					slidesToShow: 1,
					infinite:true,
					dots: false
				}
			},
			{
				breakpoint: 370,
				settings: {
					arrows: true,
					centerMode: false,
					centerPadding: '0px',
					slidesToShow: 1,
					infinite:true,
					dots: false
				}
			},
			{
				breakpoint: 360,
				settings: {
					arrows: true,
					centerMode: false,
					centerPadding: '0px',
					slidesToShow: 1,
					infinite:true,
					dots: false
				}
			}
		]
	});
});


window.frt = function () {
	/**
	 * (Раз)блокировать прокрутку <body>?
	 * @param doYouWant (true / false) будет приведено к boolean
	 * Можно добавить второй параметр, чтобы блокировать прокрутку в указанном элементе.
	 * Можно добавить третий параметр, чтобы блокировать прокрутку строго (.dg-OH_i).
	 */
	function confirmLockScroll(doYouWant) {
		if(doYouWant) document.body.classList.add('dg-OH'); else document.body.classList.remove('dg-OH');
	}

	var pNonDesktopNavMenuSwitch = document.getElementById('frt-nav-mobile-menu__switch');
	// Вешаем событие на появление навигационного меню для нешироких экранов.
	// Будем блокировать прокрутку <body>.
	pNonDesktopNavMenuSwitch.addEventListener('change', function() {
		confirmLockScroll(pNonDesktopNavMenuSwitch.checked);
	});
}();
