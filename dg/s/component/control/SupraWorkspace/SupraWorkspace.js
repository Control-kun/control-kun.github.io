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
pBody = document.body,
pSWbg = document.getElementById('dg-SW_background'),
ppSW  = document.getElementsByClassName('dg-SupraWorkspace'),
pSW0  = ppSW[0];

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
  if (target == this) { dgSupraWorkspace_Hide(); return; }

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
};



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



function dgSupraWorkspace() {
	var currentCount = 1;

	function SW() { return dgSupraWorkspace_Show(); }

	// ...и добавляем ей методы!
	SW.virtuozno = function() {
		dgSupraWorkspace_Virtuozno();
	};

	SW.show = function(pSW) {
		// TODO:
		dgSupraWorkspace_Show()
	};

	SW.reset = function() {
		currentCount = 0;
	};

	return SW;
}
var dgSW = dgSupraWorkspace();



document.onkeypress = function(event) {
	if (event.keyCode === 27) {
		// derfex+ :: По нажатию на [Esc] скрываем окно
		// Надо ли проверять, открыто ли оно?
		// По нажатию [Esc], можно прятать что-то ещё :: derfex? :: addEventListener
		dgSupraWorkspace_Hide();
	}
};



// Для Fortunum вытворяем по-быстрому:
var
		ppSW_RPC_openers = document.querySelectorAll('[data-dg-jsaction="show:SW_RPC"]'),
		pSW_RPC = ppSW[1];

Array.prototype.forEach.call(ppSW_RPC_openers,function(e){
	e.addEventListener('click', function(e){e.preventDefault();dgSW.show(pSW_RPC);}, false)
});
