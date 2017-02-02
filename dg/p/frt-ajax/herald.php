<?php
// Установка кодировки
if (!headers_sent()) {
	// Вывод заголовка с данными о кодировке страницы
	header('Content-Type: text/html; charset=utf-8');
	// Настройка локали
	setlocale(LC_ALL, 'ru_RU.65001', 'rus_RUS.65001', 'Russian_Russia. 65001', 'russian');
}



// Запуск счётчика времени выполнения скрипта.
// ...
// $_SERVER['REQUEST_TIME_FLOAT'];



// Отладка
// ...
//if(DG_MODE_DEBUG) {
$temp_BoolOB = 0; if ($temp_BoolOB) ob_start(); // derfex?
include PP('_t/dgDebug');
//}



// Запуск обработки ошибок
// ...
require PP('_services/dgToKeepInTouchService');
$dgTKIT = new dgToKeepInTouchService($dgDirect[$dgProjectDirectKey]['TKIT']);



// Безопасность. → /0.php
// ...
//	Начинать каждый файл с такой строки:
//	include $_SERVER['DOCUMENT_ROOT'].'/s/Security.php';



////        // Подключение службы для работы с БД.
////        require dgPreparePath('srv/core/services/dgSQLService.php');
////        require dgPreparePath('srv/data/dgSQL_data.php'); // derfex? :: ещё раз позже?
////        // Возможно, стоит разделить на несколько файлов:
////        // в одном user для проверки авторизации, в другом — для вывода товаров и т. п.
////		require PP('_fn/fn_FromInto');
////		require PP('_services/dgSQLService');
// derfex?



// Проверка авторизации. Определение прав и уровня доступа.
// ... -



// Исследование адреса, с которого пришёл посетитель.
// ...


// Установка кодировки.
// ...
// http://lifeexample.ru/php-primeryi-skriptov/php-kodirovka-stranitsyi.html
////	if (!headers_sent()) {
////	// Вывод заголовка с данными о кодировке страницы
////	header('Content-Type: text/html; charset=utf-8');
////	// Настройка локали
////	setlocale(LC_ALL, 'ru_RU.65001', 'rus_RUS.65001', 'Russian_Russia. 65001', 'russian');
////	// Настройка подключения к базе данных
////	mysql_query('SET names "utf8"');
////	}
// FIXME: повтор
if (!headers_sent()) {
	// Вывод заголовка с данными о кодировке страницы
	header('Content-Type: text/html; charset=utf-8');
	// Настройка локали
	setlocale(LC_ALL, 'ru_RU.65001', 'rus_RUS.65001', 'Russian_Russia. 65001', 'russian');
}



// Исследование текущего адреса. Перенаправление на внутренние страницы при необходимости.
// ...
//require PP('_fn'); // TODO?
//require PP('_services/dgParseURIService');



// Буферизирование вывода (?).
// ...
if ($temp_BoolOB) {
	$dgOutputBuffer = ob_get_contents();
	ob_end_clean();
}



////		// Создатель часто используемых фрагментов разметки.
////		require PP('_services/dgCreatorSnippetsMarkupService');
////		$dgCSM = new dgCreatorSnippetsMarkupService();



////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////////////



// derfex? :: AJAX: Вступление для обработчика AJAX-запросов.


// Первым делом стартует буферизация вывода:
$bool_ob = 1;
if ($bool_ob) ob_start(); // derfex? :: Ещё раньше?

// derfex? :: Должна быть: проверка авторизации
// derfex? :: Должна быть: проверка прав
// derfex? :: Должна быть: проверка входящих параметров



////		// derfex? :: внутри некоторых файлов, подключаемых «глубоко», используется $dgProject.
////		// Чтобы не погружаться, временно меняем значение этой переменной.
////		/* derfex? */$dgProject_Prev = $dgProject;
////		/* derfex? */$dgProject = $dgDirect[$dgProjectDirectKey]['paths']['referrer'];
////		include PP('di/init');
////		include PP('di/init',$dgProject);
////		include PP('di/dgSQL_data',$dgProject);
////		$dgSQL = new dgSQLService($dgInfoDB);
////		/* derfex? */$dgProject = $dgProject_Prev;



// Функции, могут перенестись.
////////////////////////////////////////////////////////////////////////////////

// TODO: derfex? :: Должна быть: проверка входящих параметров
function dgDataReception($id) {
	//derfex? dev derfex+
	if (isset($_POST[$id])){
		return $_POST[$id];
	} elseif (isset($_GET[$id])) {
		return $_GET[$id];
	} else { trigger_error('en ::: Данные не получены'); return false; }
}
