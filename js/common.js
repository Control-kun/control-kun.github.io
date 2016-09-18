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
					infinite:true
				}
			},
			{
				breakpoint: 375,
				settings: {
					arrows: true,
					centerMode: false,
					centerPadding: '0px',
					slidesToShow: 1,
					infinite:true
				}
			},
			{
				breakpoint: 370,
				settings: {
					arrows: true,
					centerMode: false,
					centerPadding: '0px',
					slidesToShow: 1,
					infinite:true
				}
			},
			{
				breakpoint: 360,
				settings: {
					arrows: true,
					centerMode: false,
					centerPadding: '0px',
					slidesToShow: 1,
					infinite:true
				}
			}
		]
	});
});
