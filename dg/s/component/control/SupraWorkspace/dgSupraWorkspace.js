/*
Версия %до%:
• ZA + SыR

Версия 160125:
• vz* → dg*
*/

;
'use strict';
// Объекты
//////////////////////////////////////////////////
// v a r   v z A J A X _ U R L   =   ' / q / i n d e x . p h p ' ; // derfex? :: безопасно?


// p — pointer, указатель на объект.
var
pBody = document.querySelectorAll('body')[0],
pSWbg = document.getElementById('dg-SW_background'),
pSW0  = document.getElementsByClassName('dg-SupraWorkspace')[0];

var
ppShowSW_Virtuozno = document.querySelectorAll('[data-dg-jsaction="show:SW_Virtuozno"]');



Array.prototype.forEach.call(ppShowSW_Virtuozno,function(e){
	e.addEventListener('click', function(e){e.preventDefault();dgSW.virtuozno();}, false)
}); // derfex+





// derfex+ :: Делегирование событий:
// https://learn.javascript.ru/event-delegation
pSWbg.onclick = function(event) {
  var target = event.target;

  // Щелчок за пределами SW (pSWbg) — скрываем SW
  if (target == this) { dgSupraWorkspace_Hide(); return; };

  // цикл двигается вверх от target к родителям до pSWbg
  while (target != this) {
//    if (target.tagName == 'TD') {
    if (target.hasAttribute('data-dg-jsaction') && target.getAttribute('data-dg-jsaction') == 'hide:SW') {
      // нашли элемент, который нас интересует!
      dgSupraWorkspace_Hide();
      return;
    }
    target = target.parentNode;
  }

  // возможна ситуация, когда клик был вне target
  // если цикл дошёл до pSWbg и ничего не нашёл,
  // то обработчик просто заканчивает работу
}





// Aux functions | Вспомогательные функции
////////////////////////////////////////////////////////////////////////////////////////////////////

// Запуск функции при загрузке документа. IE9+.
function dgReady(fn) {
	if (document.readyState != 'loading') fn();
	else document.addEventListener('DOMContentLoaded', fn);
}


// Запуск функции при загрузке документа. IE9+.
function dgReady2(el,className) {
	if (el.classList) el.classList.add(className); else el.className += ' ' + className;
}


// Запуск функции при загрузке документа. IE9+.
function dgFadeIn(el) {
	el.style.opacity = 0;

	var last = +new Date();
	var tick = function() {
		el.style.opacity = +el.style.opacity + (new Date() - last) / 400;
		last = +new Date();

		if (+el.style.opacity < 1) {
			(window.requestAnimationFrame && requestAnimationFrame(tick)) || setTimeout(tick, 16)
		}
	};

	tick();
}



// Modal Windows | Модальные окна
////////////////////////////////////////////////////////////////////////////////////////////////////



// Показать / скрыть SupraWorkspace
////////////////////////////////////////////////////////////////////////////////////////////////////
function dgSupraWorkspace_Show() {
	if (pSWbg.classList) {
		pSWbg.classList.remove('dg-SW-hide');
		pSWbg.classList.add('dg-SW-show');
		pBody.classList.add('dg-SW_lock');
	} else {
		pSWbg.className = el.className.replace(new RegExp('(^|\\b)' + 'dg-SW-hide'.split(' ').join('|')));
		pSWbg.className += ' ' + 'dg-SW-show';
		pBody.className += ' ' + 'dg-SW_lock';
	}
}


function dgSupraWorkspace_Hide() {
	if (pSWbg.classList) {
		pSWbg.classList.remove('dg-SW-show');
		pSWbg.classList.add('dg-SW-hide');
		pBody.classList.remove('dg-SW_lock');
	} else {
		pSWbg.className = el.className.replace(new RegExp('(^|\\b)' + 'dg-SW-show'.split(' ').join('|')));
		pSWbg.className += ' ' + 'dg-SW-hide';
		pBody.className += ' ' + 'dg-SW_lock';
		pBody.className = el.className.replace(new RegExp('(^|\\b)' + 'dg-SW_lock'.split(' ').join('|')));
	}
}



// Модальное окно: Разработка виртуозно
////////////////////////////////////////////////////////////////////////////////////////////////////
function dgSupraWorkspace_Virtuozno() {
	var title = "Сайт разрабатывается «Виртуозно»",
		etiam = '<table>'
			  + '	<tr><td>Дмитрий:</td><td><a href="callto:+79245061024+type=phone">+7 [924] 506 1024</a></td><td><a title="Написать Дмитрию сообщение ВКонтакте" href="https://vk.com/write84840095" target="_blank">VK</a></td></tr>'
			  + '	<tr><td>Павел:  </td><td><a href="callto:+79644643557+type=phone">+7 [964] 464 3557</a></td><td><a title="Написать Павлу сообщение ВКонтакте" href="https://vk.com/write55403829" target="_blank">VK</a></td></tr>'
			  + '</table>',
		panel = '<a title="Перейти в группу ВКонтакте" href="https://vk.com/virtuozno" class="dg-SW_button dg-unselectable" id="dg-SW_VK">«Виртуозно»</a><div class="dg-SW_button dg-unselectable" id="dg-SW_cansel" data-dg-jsaction="hide:SW">Закрыть</div>';

	pSW0.getElementsByClassName('dg-SW_title')[0].innerHTML=title;
	pSW0.getElementsByClassName('dg-SW_etiam')[0].innerHTML=etiam;
	pSW0.getElementsByClassName('dg-SW_panel')[0].innerHTML=panel;

	dgSupraWorkspace_Show();
}



//var QQQQQQQQ=document.getElementById('exe-Contacts');
//
//QQQQQQQQ.onclick=dgSupraWorkspace_Show();

function dgSupraWorkspace() {
	var currentCount = 1;

	function SW() { return dgSupraWorkspace_Show(); }

	// ...и добавляем ей методы!
	SW.virtuozno = function() {
		dgSupraWorkspace_Virtuozno();
	};
	SW.show0 = function(value) {
		currentCount = value;
	};
	SW.show = function(value) {
		currentCount = value;
		return currentCount;
	};

	SW.reset = function() {
		currentCount = 0;
	};

	return SW;
}
var dgSW = dgSupraWorkspace();






////////////////////////////////
function dgSupraWorkspaceXXX() {
	var currentCount = 1;

	function SW() { return currentCount++; }

	// ...и добавляем ей методы!
	SW.show0 = function(value) {
		currentCount = value;
	};
	SW.show = function(value) {
		currentCount = value;
		return currentCount;
	};

	SW.reset = function() {
		currentCount = 0;
	};

	return SW;
}

//var dgXXX = dgSupraWorkspaceXXX();
//
//alert( dgXXX() ); // 1
//alert( dgXXX.show(5) ); // 2
//
//dgXXX.show(7);
//alert( dgXXX() ); // 5/**/



// Модальное окно: Написать письмо
////////////////////////////////////////////////////////////////////////////////////////////////////
////		$(document).ready(function() {
////			function SupraWorkspace_Contact() {
////				var title = "Написать письмо",
////					etiam = '<div class="dg-SW_etiam-ABS"><textarea name="message" rows="5" class="exe-SW_textarea" placeholder="Введите своё сообщение…"></textarea></div><div class="exe-SW_textarea_block"></div>';
////					panel = '<div class="dg-SW_button dg-unselectable">Отправить</div><div class="dg-SW_button dg-unselectable" id="dg-SW_cansel">Закрыть</div>';
////		
////				$(document).ready(function() {
////					SupraWorkspace_Show();
////		
////					$(".dg-SW_title").html(title);
////					$(".dg-SW_etiam").html(etiam);
////					$(".dg-SW_panel").html(panel);
////		
////					$('#dg-SW_cansel').click(function() { SupraWorkspace_Hide(); });
////					$('.dg-SW_close' ).click(function() { SupraWorkspace_Hide(); });
////				});
////			}
////		
////			/*$('.exe-btn-contact').click(function() { SupraWorkspace_Contact(); });*/
////			$(".exe-Icon-EmailSend").click(function() { SupraWorkspace_Contact(); });
////			$(".exe-Contacts .exe-Left-Contact").click(function() { SupraWorkspace_Contact(); });
////		});



document.onkeypress = function(event) {
	if (event.keyCode === 27) {
		// derfex+ :: По нажатию на [Esc] скрываем окно
		// Надо ли проверять, открыто ли оно?
		// По нажатию [Esc], можно прятать что-то ещё :: derfex? :: addEventListener
		dgSupraWorkspace_Hide();
	}
};
