/*$(function() {

	//SVG Fallback
	if(!Modernizr.svg) {
		$("img[src*='svg']").attr("src", function() {
			return $(this).attr("src").replace(".svg", ".png");
		});
	};


	$("img, a").on("dragstart", function(event) { event.preventDefault(); });

});*/
$( document ).ready(function() {
	$('#production-slider,#instagramm-slider,#blueprints-slider,#fur-slider').slick({
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

	$('#frt-carousel-works').slick({
		centerMode: true,
		dots:true,
		centerPadding: '0',
		slidesToShow: 1,
		infinite : false,
		edgeFriction: true,
		responsive: [
			{
				breakpoint: 1920,
				settings: {
					arrows: true,
					centerMode: true,
					centerPadding: '0px',
					slidesToShow: 1
				}
			},
			{
				breakpoint: 768,
				settings: {
					arrows: true,
					centerMode: true,
					centerPadding: '0px',
					slidesToShow: 1,
					infinite : true,
					dots:false
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
		if (doYouWant) document.body.classList.add('dg-OH'); else document.body.classList.remove('dg-OH');
	}

	var pNonDesktopNavMenuSwitch = document.getElementById('frt-nav-mobile-menu__switch');
	// Вешаем событие на появление навигационного меню для нешироких экранов.
	// Будем блокировать прокрутку <body>.
	if (pNonDesktopNavMenuSwitch) {
		pNonDesktopNavMenuSwitch.addEventListener('change', function () {
			confirmLockScroll(pNonDesktopNavMenuSwitch.checked);
		});
	}



	// AJAX: отправка данных формы обратного звонка
	var formRPC = { // request phone call
		pSW_RPC: pSW_RPC,
		pName: document.getElementById('user-name'),
		pPhone: document.getElementById('user-phone'),
		pSubmit: document.getElementById('submit')
	};
	if (formRPC.pSW_RPC) {
		formRPC.getData = function () {
			// TODO: Собрать данные со всех полей.
			// TODO: Указать ключи по атрибуту `data-dg-request-field-name` (?) или `name`.
			// TODO: Учесть игнорирование полей, помеченных специальным CSS-классом или атрибутом.
			return JSON.stringify({
				name:  formRPC.pName.value,
				phone: formRPC.pPhone.value
			});
		};
		formRPC.AJAX = dg.$dev.AJAX;
		formRPC.AJAX.set({
			url: '/q/ajax.php',
			callback: function () {
				debugger;
				console.log(arguments);
				return false;
			}
		});
		formRPC.sendData = function () {
			console.log('this for sendData():', this);
			formRPC.AJAX.set({request: 'JSONstr={"Mission":"form:phonecall","Data":' + formRPC.getData() + '}'})();
			return false;
		};
		// formRPC.pSubmit.addEventListener('click', function(){ return formRPC.sendData(); });
		// formRPC.pSubmit.onclick = function(){ return formRPC.sendData(); };
		formRPC.pSW_RPC.addEventListener('submit', function (event) {
			event.preventDefault();
			formRPC.sendData();
		});
	}


	// Фильтр для товаров (проектов):
	var pSectionProducts = document.getElementById('frt-section-products');
	if (pSectionProducts) {
		var classNameForCurrentSwitch = 'frt-button--switch-current';
		var pSwitchShowAll = pSectionProducts.getElementsByClassName(classNameForCurrentSwitch)[0]; // FIXME?: хе-хе
		var ppProducts = Array.prototype.slice.call(
			pSectionProducts.querySelectorAll('.projects-container .projects-item[data-frt-subcategory]')
		);
		var infoFilterOfProducts = {
			COUNT_OUTPUT: 1,
			COUNT_UNLIMITED: true,
			currentKind: true,
			tabs: {
				pp: Array.prototype.slice.call(pSectionProducts.querySelectorAll('[data-frt-action]')),
				current: pSwitchShowAll
			},
			items: []
		};
		console.log(infoFilterOfProducts.tabs.current);

		// Если товаров много, то будем скрывать часть.
		// А также добавим кнопку, при клике на которую можно переключаться между ограниченным и неограниченным режимами выдачи.
		if (infoFilterOfProducts.COUNT_OUTPUT < ppProducts.length) {
			infoFilterOfProducts.COUNT_UNLIMITED = false;
			var auxElements = Object.create(null);
			auxElements.div = document.createElement('div');
			auxElements.div.className = 'dg-TAC';
			auxElements.button = document.createElement('button');
			auxElements.button.className = 'dg-button frt-button';
			auxElements.button.innerText = 'Показать все';
			auxElements.button.addEventListener('click', function() {
				if (infoFilterOfProducts.COUNT_UNLIMITED) {
					infoFilterOfProducts.COUNT_UNLIMITED = false;
					auxElements.button.innerText = 'Показать все';
				} else {
					infoFilterOfProducts.COUNT_UNLIMITED = true;
					auxElements.button.innerText = 'Скрыть часть';
				}
				applyFilter(infoFilterOfProducts.currentKind);
			});
			auxElements.div.appendChild(auxElements.button);
			pSectionProducts.appendChild(auxElements.div);
		}

		ppProducts.forEach(function(item, i, arr) {
			var kind = item.getAttribute('data-frt-subcategory');
			var isShow = i < infoFilterOfProducts.COUNT_OUTPUT;
			if(!isShow) {
				item.style.display = 'none';
			}
			infoFilterOfProducts.items.push({
				p: item,
				kind: kind,
				isShow: isShow
			});
		});

		// TODO: оптимизация.
		// Добавить свойство (bool) isAllNextStatus или isAllNextShow,
		// в котором хранить метку о том, что последующие элементы (не) нуждаются в отображении (скрытии).
		function applyFilter(kind) {
			var currentCountOutput = 0;
			infoFilterOfProducts.items.forEach(function(item, i, arr) {
				if ((infoFilterOfProducts.COUNT_UNLIMITED || currentCountOutput < infoFilterOfProducts.COUNT_OUTPUT) && (item.kind == kind || kind === true)) {
					if (!item.isShow){
						item.p.style.display = '';
						item.isShow = true;
					}
					currentCountOutput++;
				} else {
					if (item.isShow) {
						item.p.style.display = 'none';
						item.isShow = false;
					}
				}
			});
		}

		pSwitchShowAll.addEventListener('click', function () {
			// TODO: проверка, не выбран ли тот же?
			infoFilterOfProducts.currentKind = true;
			infoFilterOfProducts.tabs.current.classList.remove(classNameForCurrentSwitch);
			infoFilterOfProducts.tabs.current = pSwitchShowAll;
			pSwitchShowAll.classList.add(classNameForCurrentSwitch);
			applyFilter(true);
		});

		infoFilterOfProducts.tabs.pp.forEach(function(item, i, arr) {
			var kind = item.getAttribute('data-frt-action').split(':')[1];
			item.addEventListener('click', function () {
				// TODO: проверка, не выбран ли тот же?
				infoFilterOfProducts.currentKind = kind;
				infoFilterOfProducts.tabs.current.classList.remove(classNameForCurrentSwitch);
				infoFilterOfProducts.tabs.current = item;
				item.classList.add(classNameForCurrentSwitch);
				applyFilter(kind);
			});
		});
	}
}();
