;
// FIXME: вдруг window.dg = true;?
if (window.dg === undefined) window.dg = {};
if (window.$service === undefined) window.dg.$service = {};
window.dg.$service.AJAX = function () {
	'use strict';

	// FIXME
	var dgLog = dg.$service.Log;

	var
			_optCaseDefault = {
				url:      null,
				request:  null,
				method:  'POST',
				async:    true,
				notify:   true,
				callback: null
			},
			_optCase,
			_getCaseActual = function() {
				var Case = Object.create(null);
				debugger;
				Case.url      = _optCase._url      || _optCaseDefault.url;
				Case.request  = _optCase._request  || _optCaseDefault.request;
				Case.method   = _optCase._method   || _optCaseDefault.method;
				Case.async    = _optCase._async    || _optCaseDefault.async;
				Case.notify   = _optCase._notify   || _optCaseDefault.notify;
				Case.callback = _optCase._callback || _optCaseDefault.callback;
				return Case;
			};


	// Адрес приёмника запросов:
	var dgAJAX_URL = '/dg/q/index.php'; // derfex? :: безопасно? // derfex+ :: используется старый метод
	// https://learn.javascript.ru/descriptors-getters-setters


	// Вывод информации из Output Buffer:
	var pAJAX_DebugOB = document.getElementById('dg-DebugOut');


///---
	/**
	 * Анализ ответа сервера в виде JSON.
	 * Планируется дополнительный анализ. Возврат данных, обработка ошибок, уведомления.
	 *
	 * @param {string} response — ответ сервера, JSON-строка.
	 *
	 * @return {array/object} true / false.
	 **/
	function analysisOfServerResponseInJSON(response) { // derfex+ derfex- derfex?
		try {
			var a = JSON.parse(response);
		}
		catch (err) {
			dgLog({msg: 'Ответ пуст или имеет неверный формат', response: response, error: err});
			dgLog();
			if (pAJAX_DebugOB) pAJAX_DebugOB.innerHTML = response;
			return false;
		}


		//if ('notify' in a) dgNotify(a.notify); // derfex? :: возможна ошибка

		try {
			dgNotify(a.Notify);
		}
		catch (err) {
			dgLog({notify_undefined: a, error: err});
		} // derfex-

		//if ('OB' in a) pAJAX_DebugOB.innerHTML=a.OB; // derfex? :: возможна ошибка
		try {
			if (pAJAX_DebugOB)pAJAX_DebugOB.innerHTML = '<aside>' + a.OB + '</aside>'
		}
		catch (err) {
			dgLog({OB_undefined: a, error: err});
		}
		//if ('OB' in a) pAJAX_DebugOB.innerHTML='<div style="display:none">'+a.OB+'</div>'; // derfex? :: возможна ошибка?

//	if ('data' in a) return a.data; // derfex? :: возможна ошибка
//	 else dgLog({msg:'Нет данных',JSON:a});
		try {
			if ('Data' in a) return a.Data;
		}
		catch (err) {
			dgLog({msg: 'Нет данных', JSON: a, error: err});
			dgLog();
		}


		dgLog({msg: 'JSON', JSON: a}); // derfex-
	}


	// Основная функция:
	/**
	 * Отправляет AJAX-запрос.
	 * @param {object} Case — набор параметров.
	 * @param {string} Case.url — куда?
	 * @param {string} Case.request — с чем?
	 * @param {string} Case.notify — уведомляем пользователя?
	 *
	 * @return {boolean} true при удалении атрибута, false — если нечего удалять или атрибут заполнен.
	 **/
	function dgAJAX(Case) {
		// проверка входящих параметров:
		if (!('url' in Case)) {
			dgLog.e(Case);
			return false
		}
		var req = Case.request || '', notify = Case.notify || true;
		// Что может быть: url, request, [method, async,] notify, callback

		var xhr; // создаём наш XMLHttpRequest-объект
		if (window.XMLHttpRequest) {
			xhr = new XMLHttpRequest();
		}
		else if (window.ActiveXObject) {
			xhr = new ActiveXObject("Microsoft.XMLHTTP"); // для Internet Explorer'а (версии?) TODO: уточнить
		} else {
			dgLog.e({XMLHttpRequest: window.XMLHttpRequest, ActiveXObject: window.ActiveXObject});
			return false
		}

		// derfex? :: из-за отключения асинхронности определяем тело функции сразу
		xhr.onreadystatechange = function () {
			//if (this.readyState != 4) return;
			// встраиваем функцию проверки статуса нашего запроса
			// это вызывается при каждом изменении статуса
			if (xhr.readyState === 4 && xhr.status === 200) {
				var a = analysisOfServerResponseInJSON(this.responseText);
				//if (Case.callback) Case.callback.call(a.data); // вызываем callback
				if ('callback' in Case) Case.callback(a); // вызываем callback
				// else dgError(Case); // derfex? :: callback необязателен
			} else if (xhr.status !== 200)dgLog.e(xhr.status); // derfex?
		};

///	xhr.open('POST', Case.url, true);
		xhr.open('POST', Case.url, false); // derfex- :: блокируем асинхронность пока
		//xhr.setRequestHeader('Content-type', 'application/json; charset=utf-8');
		xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
		xhr.send(req); // derfex? :: if(req) xhr.send(req) else xhr.send();
//	if(req) xhr.send(req); else xhr.send();

	}

//	dgAJAX.create = function (Case) {
//		return new dgAJAX(Case);
//	};

	var _Constructor = function (Case) {
		// Case is undefined
		Case = _getCaseActual().call(_Constructor);
		console.dir(Case);
		// проверка входящих параметров:
		if (!('url' in Case)) {
			dgLog.e(Case);
			return false
		}
		var req = Case.request || '', notify = Case.notify || true;
		// Что может быть: url, request, [method, async,] notify, callback

		var xhr; // создаём наш XMLHttpRequest-объект
		if (window.XMLHttpRequest) {
			xhr = new XMLHttpRequest();
		}
		else if (window.ActiveXObject) {
			xhr = new ActiveXObject("Microsoft.XMLHTTP"); // для Internet Explorer'а (версии?) TODO: уточнить
		} else {
			dgLog.e({XMLHttpRequest: window.XMLHttpRequest, ActiveXObject: window.ActiveXObject});
			return false
		}

		// derfex? :: из-за отключения асинхронности определяем тело функции сразу
		xhr.onreadystatechange = function () {
			//if (this.readyState != 4) return;
			// встраиваем функцию проверки статуса нашего запроса
			// это вызывается при каждом изменении статуса
			if (xhr.readyState === 4 && xhr.status === 200) {
				var a = analysisOfServerResponseInJSON(this.responseText);
				//if (Case.callback) Case.callback.call(a.data); // вызываем callback
				if ('callback' in Case) Case.callback(a); // вызываем callback
				// else dgError(Case); // derfex? :: callback необязателен
			} else if (xhr.status !== 200)dgLog.e(xhr.status); // derfex?
		};

///	xhr.open('POST', Case.url, true);
		xhr.open('POST', Case.url, false); // derfex- :: блокируем асинхронность пока
		//xhr.setRequestHeader('Content-type', 'application/json; charset=utf-8');
		xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
		xhr.send(req); // derfex? :: if(req) xhr.send(req) else xhr.send();
//	if(req) xhr.send(req); else xhr.send();
	};

	dgAJAX.create = function (Case) {
		if ('url'      in Case) _Constructor._url      = Case.url; // FIXME?: ownProperty(?)
		if ('request'  in Case) _Constructor._request  = Case.request;
		if ('method'   in Case) _Constructor._method   = Case.method;
		if ('async'    in Case) _Constructor._async    = Case.async;
		if ('notify'   in Case) _Constructor._notify   = Case.notify;
		if ('callback' in Case) _Constructor._callback = Case.callback;
		console.log('_Constructor:');
		console.dir(_Constructor);
		return _Constructor;
	};

	return dgAJAX;
}();



window.dg.$dev.AJAX = function () {
	'use strict';

	// FIXME
	debugger;
	var dgLog = dg.$service.Log;

	var
			_optCaseDefault = {
				url:      null,
				request:  null,
				method:  'POST',
				async:    true,
				notify:   true,
				callback: null
			},
			_optCase,
			_getCaseActual = function() {
				var Case = Object.create(null);
				debugger;
				Case.url      = _optCase._url      || _optCaseDefault.url;
				Case.request  = _optCase._request  || _optCaseDefault.request;
				Case.method   = _optCase._method   || _optCaseDefault.method;
				Case.async    = _optCase._async    || _optCaseDefault.async;
				Case.notify   = _optCase._notify   || _optCaseDefault.notify;
				Case.callback = _optCase._callback || _optCaseDefault.callback;
				return Case;
			};


	/**
	 * Анализ ответа сервера в виде JSON.
	 * Планируется дополнительный анализ. Возврат данных, обработка ошибок, уведомления.
	 *
	 * @param {string} response — ответ сервера, JSON-строка.
	 *
	 * @return {array/object} true / false.
	 **/
	function analysisOfServerResponseInJSON(response) { // derfex+ derfex- derfex?
		try {
			var a = JSON.parse(response);
		}
		catch (err) {
			dgLog({msg: 'Ответ пуст или имеет неверный формат', response: response, error: err});
			dgLog();
			if (pAJAX_DebugOB) pAJAX_DebugOB.innerHTML = response;
			return false;
		}

		//if ('OB' in a) pAJAX_DebugOB.innerHTML=a.OB; // derfex? :: возможна ошибка
		try {
			if (pAJAX_DebugOB)pAJAX_DebugOB.innerHTML = '<aside>' + a.OB + '</aside>'
		}
		catch (err) {
			dgLog({OB_undefined: a, error: err});
		}
		//if ('OB' in a) pAJAX_DebugOB.innerHTML='<div style="display:none">'+a.OB+'</div>'; // derfex? :: возможна ошибка?

//	if ('data' in a) return a.data; // derfex? :: возможна ошибка
//	 else dgLog({msg:'Нет данных',JSON:a});
		try {
			if ('Data' in a) return a.Data;
		}
		catch (err) {
			dgLog({msg: 'Нет данных', JSON: a, error: err});
			dgLog();
		}


		dgLog({msg: 'JSON', JSON: a}); // derfex-
	}


	// Основная функция:
	/**
	 * Отправляет AJAX-запрос.
	 * @param {object} Case — набор параметров.
	 * @param {string} Case.url — куда?
	 * @param {string} Case.request — с чем?
	 * @param {string} Case.notify — уведомляем пользователя?
	 *
	 * @return {boolean} true при удалении атрибута, false — если нечего удалять или атрибут заполнен.
	 **/
	function dgAJAX(Case) {
		// проверка входящих параметров:
		if (!('url' in Case)) {
			dgLog.e(Case);
			return false
		}
		var req = Case.request || '', notify = Case.notify || true;
		// Что может быть: url, request, [method, async,] notify, callback

		var xhr; // создаём наш XMLHttpRequest-объект
		if (window.XMLHttpRequest) {
			xhr = new XMLHttpRequest();
		}
		else if (window.ActiveXObject) {
			xhr = new ActiveXObject("Microsoft.XMLHTTP"); // для Internet Explorer'а (версии?) TODO: уточнить
		} else {
			dgLog.e({XMLHttpRequest: window.XMLHttpRequest, ActiveXObject: window.ActiveXObject});
			return false
		}

		// derfex? :: из-за отключения асинхронности определяем тело функции сразу
		xhr.onreadystatechange = function () {
			//if (this.readyState != 4) return;
			// встраиваем функцию проверки статуса нашего запроса
			// это вызывается при каждом изменении статуса
			if (xhr.readyState === 4 && xhr.status === 200) {
				var a = analysisOfServerResponseInJSON(this.responseText);
				//if (Case.callback) Case.callback.call(a.data); // вызываем callback
				if ('callback' in Case) Case.callback(a); // вызываем callback
				// else dgError(Case); // derfex? :: callback необязателен
			} else if (xhr.status !== 200)dgLog.e(xhr.status); // derfex?
		};

///	xhr.open('POST', Case.url, true);
		xhr.open('POST', Case.url, false); // derfex- :: блокируем асинхронность пока
		//xhr.setRequestHeader('Content-type', 'application/json; charset=utf-8');
		xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
		xhr.send(req); // derfex? :: if(req) xhr.send(req) else xhr.send();
//	if(req) xhr.send(req); else xhr.send();

	}

	dgAJAX.set = function (Case) {
		if ('url'      in Case) dgAJAX._url      = Case.url; // FIXME?: ownProperty(?)
		if ('request'  in Case) dgAJAX._request  = Case.request;
		if ('method'   in Case) dgAJAX._method   = Case.method;
		if ('async'    in Case) dgAJAX._async    = Case.async;
		if ('notify'   in Case) dgAJAX._notify   = Case.notify;
		if ('callback' in Case) dgAJAX._callback = Case.callback;
		console.log('dgAJAX:');
		console.dir(dgAJAX);
		console.dir(this);
	};

	return dgAJAX;
}();


