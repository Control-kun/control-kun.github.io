;
// FIXME: вдруг window.dg = true;?
if (window.dg === undefined) window.dg = {};
if (window.$service === undefined) window.dg.$service = {};
window.dg.$service.Log = function () {
	'use strict';

//	var defaultOutput = 'AUX4PHP'; // derfex-
	var defaultOutput = 'console'; // derfex? :: безопасно?
//	var mode = {s:'log', w:'warn', e:'error', i:'info', d:'dir', a:'assert', g:'group'};


	// derfex? :: Переопределение консоли:
	// http://habrahabr.ru/post/114483/#comment_3696227
	// Решается проблема с неопределенной консолью, легко отключается отладка.
	// new function () {
	// 	var debug    = true;
	// 	var original = window.console;
	// 	window.console = {};
	// 	['log', 'warn', 'error', 'info', 'dir', 'assert', 'group', 'groupCollapsed', 'groupEnd',
	// 		'clear', 'count', 'debug', 'dirxml', 'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd', 'timeStamp', 'timeline', 'timelineEnd', 'trace'
	// 	].forEach(function (method) {
	// 		console[method] = function () {
	// 			return (debug && original) ? original[method].apply(original, arguments) : null;
	// 		}
	// 	});
	// };


	// Журнал ошибок:
	var errors = [];

	// Упрощённый вывод в консоль:
	function consoleAuto(v) {
		// Определить тип переменной. Переменные со свойствами выводить в console.dir, остальное — в console.log.
		// https://learn.javascript.ru/types-intro#type-typeof
		if ((typeof(v) === 'object' || typeof(v) === 'function') && v !== null) console.dir(v); else console.log(v);
	}

	// Основная функция:
	function log(error) {
		if (error === undefined) {
			console.groupCollapsed('dgLog');
			errors.forEach(function(item) { consoleAuto(item); });
			console.groupEnd();
			return;
		}
		errors[errors.length] = error;
	}

	// Методы основной функции:
	log.into = function(p) {
		p = p || defaultOutput;
		if (p && p!='console')
			p.innerHTML = '<aside>' + log() + '</aside>';
		else
			log();
	};

	log.clear = function() { errors = [] };

	log.a = function(v) { consoleAuto(v) };
	log.e = function(v) { console.error(v) };
	log.w = function(v) { console.warn(v) };
//	log.s = function(v) { console.log(v) };
	log.i = function(v) { console.info(v) };
	log.d = function(v) { console.dir(v) };

	log.g = function(v) { console.group(v) };
	log.gc = function(v) { console.groupCollapsed(v) };
	log.ge = function(v) { console.groupEnd(v) };
	log.G = function(t) {
		console.groupCollapsed(t);
		var V = arguments;
		V.shift();
		V.forEach(function (v) {
			consoleAuto(v);
		});
		console.groupEnd()
	};

	log.D = function(v) { console.debug(v) };

	return log;
};
