<?php // Создан для переносимости | Portable
// Используется для указания корневого каталога dgEngine при переносе папок.
// Этот документ необходимо оставить в корневом каталоге домена, ибо на него ссылаются другие файлы.


/////	error_reporting(E_ALL);
/////	ini_set('display_errors', 'on');
/////
/////	// Расширенный вывод ошибок
/////	ini_set('xdebug.default_enable', 1);
/////	ini_set('xdebug.show_local_vars', 1);
/////	ini_set('xdebug.collect_params', 4);



define('DG_J_0', '0');
define('DG_J_VERS', 'v/');
define('DG_J_VERS_SEPARATOR', '-');

// define('DG_J_QUER', 'q/');
// define('DG_J_AJAX', DG_J_QUER .'ajax.php');

define('DG_J_SYST', 's/');               		//	define('DG_SYS_SYST_0', DG_SYS_ROOT_0 . DG_J_SYST);
define('DG_J_CORE', DG_J_SYST . 'core/');		//	define('DG_SYS_CORE_0', DG_SYS_ROOT_0 . DG_J_CORE);/*
define('DG_J_INIT', DG_J_SYST . 'init/');		//	define('DG_SYS_INIT_0', DG_SYS_ROOT_0 . DG_J_INIT);*/
define('DG_J_LOGS', DG_J_SYST . 'logs/');		//	define('DG_SYS_LOGS_0', DG_SYS_ROOT_0 . DG_J_LOGS);

// Далее содержимое папки [ %dgEngine%/p/ ]. 'p' теперь 'projects', а потом уже 'public'.
define('DG_J_PUBL', 'p/');
// define('DG_SYS_PUBL_0', DG_SYS_ROOT_0 . DG_J_PUBL);
// define('DG_SYS_PUBL_X', DG_SYS_ROOT_X . DG_J_PUBL);
// define('DG_SRC_PUBL_0', DG_SRC_ROOT_0 . DG_J_PUBL);
// define('DG_SRC_PUBL_X', DG_SRC_ROOT_X . DG_J_PUBL);

define('DG_J_DOCS', '/d/');
define('DG_J_CACH', DG_J_DOCS . 'cache/');
define('DG_J_INFO', DG_J_DOCS . 'info/');
define('DG_J_SECT', DG_J_DOCS . 's/');
define('DG_J_MODS', '/m/');

// define('DG_SRC_DOCS_J', DG_SYS_ROOT . DG_J_SYST);
// define('DG_SRC_CACH_J', DG_SYS_ROOT . DG_J_CORE);
// define('DG_SRC_INFO_J', DG_SYS_ROOT . DG_J_INIT);
// define('DG_SRC_SECT_J', DG_SYS_ROOT . DG_J_LOGS);



// define('DG_JW0_DOCS',  DG_J_PUBL . '0' . DG_J_DOCS);     define('DG_W0_DOCS',  DG_ROOT . DG_JW0_DOCS);
// define('DG_JW0_CACH',  DG_J_PUBL . '0' . DG_J_CACH);     define('DG_W0_CACH',  DG_ROOT . DG_JW0_CACH);
// define('DG_JW0_INFO',  DG_J_PUBL . '0' . DG_J_INFO);     define('DG_W0_INFO',  DG_ROOT . DG_JW0_INFO);
// define('DG_JW0_SECT',  DG_J_PUBL . '0' . DG_J_SECT);     define('DG_W0_SECT',  DG_ROOT . DG_JW0_SECT);



// Фрагменты (названия папок, без лишнего)   // Фрагменты от 'p/0'                                    // Фрагменты от web-корня
define('DG_J_ADOPT', '/adopt/'); 			//	define('DG_JW0_ADOPT', DG_J_PUBL . '0' . DG_JW_ADOPT);   define('DG_W0_ADOPT', DG_ROOT . DG_JW0_ADOPT);
define('DG_J_CSS',   '/ui/css/');			//	define('DG_JW0_CSS',   DG_J_PUBL . '0' . DG_JW_CSS);     define('DG_W0_CSS',   DG_ROOT . DG_JW0_CSS);
define('DG_J_JS',    '/ui/js/'); 			//	define('DG_JW0_JS',    DG_J_PUBL . '0' . DG_JW_JS);      define('DG_W0_JS',    DG_ROOT . DG_JW0_JS);
define('DG_J_IMG',   '/ui/i/');  			//	define('DG_JW0_IMG',   DG_J_PUBL . '0' . DG_JW_IMG);     define('DG_W0_IMG',   DG_ROOT . DG_JW0_IMG);
define('DG_J_uIMG',  '/u/i/');   			//	define('DG_JW0_uIMG',  DG_J_PUBL . '0' . DG_JW_uIMG);    define('DG_W0_uIMG',  DG_ROOT . DG_JW0_uIMG);






define('DG_NAV_ROOT', DG_J_PRJ_DEMAND . '/'); // derfex? :: инициализировать позже, чтобы получилась ссылка на корневой каталог (index.php) проекта
// — Публичные, доступные по URL
//	define('DG_HOME',   DG_J_PRJ_DEMAND . '/'); // '/'
//	define('DG_W_FOLD', DG_J_PRJ_DEMAND . DG_J_PRJ_ENGINE . '/');
//	define('DG_W_PUBL', DG_J_PRJ_DEMAND . DG_J_PRJ_ENGINE . '/p/');



// Константы путей:
// J — (от “jumper” — перемычка, соединитель) — фрагмент пути в середине.
// W — (от “web”) — доступные в web с помощью URL.
// Константы без DG_ROOT нужны для версий, сохраняемых в [ %dgEngine%/t/ ].








// Управление режимами публикации и отладки.
// derfex+ :: использовать константы в других файлах
if (strpos($_SERVER['PHP_SELF'], '/derfex-projects/dgtz') === FALSE)
	 define('DG_MODE_RELEASE',1);
else define('DG_MODE_RELEASE',0);
if(DG_MODE_RELEASE) define('DG_MODE_DEBUG',0); else define('DG_MODE_DEBUG',1);
define('DG_MODE_AUTH', FALSE);



//http://habrahabr.ru/post/127816/
// Включение перехвата и логирования всех типов ошибок.
error_reporting(-1);
if(DG_MODE_RELEASE) {
	ini_set('display_errors', true); // derfex-
//	ini_set('display_errors', false);
//	ini_set('log_errors', true);
//	ini_set('error_log', 's/logs/error.log');
}


// Необходим механизм проверки безопасности.
// require vzPreparePath('s/core/Security.php'); // derfex-
// Все файлы буду сначала включать vz.php, а следовательно проверяться на безопасность.
// derfex? :: 150904 :: Решено подключать require_once, повлияет на производительность.


/*
// Функция внедрения (включения/требования) файлов [include/require].
// derfex? :: проблема
// файл вставляется внутри функции: его переменные не видны

// http://php.net/manual/ru/function.include.php#example-158
// derfex+ :: идея возвращать содержимое файла в массиве.
function vzInclude($path='',$require=False) {
	// 0. Проверка входящего параметра:
	if ($path=='') return Null;
	$p=$path;
	// 1. Начальный '/' интерпретируется как корневой каталог vzEngine (в начало подставляется VZ_ROOT):
	if ($path[0]==='/') $p=DG_ROOT.$path;
	/* 2.
	??? Может попытка включить файл с чужого домена?
	??? Заменить слеши на DIRECTORY_SEPARATOR
	??? realpath?
	??? Проверка существования файла?
	* /
	// 3. include/require:
	if ($require) require $p; else include $p;
}
/**/



//  Вспомогательная функция, используемая в pp()
//
//	$P = '' — path,
//	$X = 0  — exertus (project, region),
//	$D = '' — datetime,
//	$ext = 'php' — extension
//
//	@result (str) — путь к подключаемому файлу.
function dgPP_interpretation($P = '', $X = 0, $D = '', $ext = 'php') // derfex? :: значения по умолчанию нужны?
{
	/*
	 * %корень%
	 * %директория версий || ''%
	 * » Директория движка или проектов:
		* %директория движка%
			// всегда 0
		* %директория проектов%
			// 0 || %идентификатор проекта%
	 * %путь% // в т. ч. интерпретация «коротышей»
	 * %разделитель версии% + $D (с расширением файла) || ''
	 */


	/*
	 * $D: собираем фрагменты пути для версии файла
	 * %директория версий || ''%
	 * %разделитель версии% + $D (с расширением файла) || ''
	 */

	if ($D==='') { $tA='';$tC='.'.$ext; } else { $tA=DG_J_VERS; $tC=DG_J_VERS_SEPARATOR.$D.'.'.$ext; }



	/*
	 * Движок или ресурсы проекта?
	 */

	// derfex? :: пусть пока чаще вероятность ресурсов проекта
	$boolX = $P[0] !== '_';



	/*
	 * $X: собираем фрагменты пути, исходя из идентификатора проекта
	 * %корень%
	 * // 0 || %идентификатор проекта%
	 */

	// derfex? :: пусть пока чаще вероятность нуля
	if ($X===0) {
	//	$root = $boolX ? DG_SRC_ROOT_0 : DG_SYS_ROOT_0; // derfex- :: логическая ошибка, может пригодиться
		$root = DG_SYS_ROOT_0;
		// derfex? :: для движка $X = ''; ?
	} else {
	//	$root = $boolX ? DG_SRC_ROOT_X : DG_SYS_ROOT_X; // derfex- :: логическая ошибка, может пригодиться
		$root = DG_SYS_ROOT_X;
	}



	/*
	 * $P: собираем остальные фрагменты пути
	 * %путь% // в т. ч. интерпретация «коротышей»
	 */
	// derfex? :: пока мы определяем только по первому '_' в $P, можем использовать
	if (!$boolX) return $root . $tA . DG_J_CORE . substr($P, 1) . /*'.'.$ext .*/ $tC;

	// 1.2. Начальный '/' интерпретируется как корневой каталог (в начало подставляется DG_SYS_ROOT_0 / DG_SYS_ROOT_X, в зависмости от $X):
	if ($P[0] === '/') return $root . substr($P, 1); // derfex? :: неактуальная версия не поддерживается?

	$ss = substr($P, 0, 3);
//	// 1.3. Другие коротыши в папке s:
//	$shorts = [/*'si/' => DG_INIT, 'sc/' => DG_CACH*/];
//	if (isset($shorts[$ss])) return $shorts[$ss] . substr($P, 3);

	// 1.4. Коротыши в папке p:
	$shorts = [
		'pd/' => DG_J_DOCS,
		'dc/' => DG_J_CACH,
		'di/' => DG_J_INFO,
		'ds/' => DG_J_SECT,
		'mm/' => DG_J_MODS
	];

	if (isset($shorts[$ss])) {
	//	$tCx=($D==='')?'':$tC.strrchr($P, '.'); // derfex? :: принимаем расширение равным '.php'
		return $root . $tA . DG_J_PUBL . $X . $shorts[$ss] . substr($P, 3) . $tC;
	}

	return 'dev :: dgPP_interpretation :: error';
//	return $p;
//	derfex+ :: относительные пути не проверены
}



/**
 * PP (prepare path)
 * @param string $P   — path,
 * @param string $X   — exertus (project, region),
 * @param string $D   — datetime,
 * @param string $ext — extension
 * @return string — путь к подключаемому файлу.
 */
function PP($P = '', $X = 0, $D = '', $ext = 'php')
{
	// 0. Проверка входящих параметров:
	$allowX = [
		0=>1,23=>1,75=>1,
		'mli'=>1,
		'mhg'=>1,'mhg-adm'=>1,'mhg-ajax'=>1,
		'vz'=>1,
		'zabagro'=>1,'zabagro-adm'=>1,'zabagro-ajax'=>1,
		'zm'=>1,'zm-gtn'=>1,'zm-pick'=>1,

		'frt-ajax'=>1
	];
	if ($P == '' or !isset($allowX[$X])) { // derfex+ :: возможность не проверять
		trigger_error('ww ::: Неверные параметры: P=\'' . $P . '\', X=' . $X . ', D=' . ($D<>'' ? $D : "''") . ', extension=' . $ext . '.');
		return DG_SYS_ROOT_0 . DG_J_CORE . 'empty.php';
	}
	// 1. Интерпретация:
	$url = dgPP_interpretation($P, $X, $D, $ext);
	// 2. Предусмотрительность:
	// ??? Может попытка включить файл с чужого домена?
	// ??? Заменить слеши на DIRECTORY_SEPARATOR
	// ??? realpath?

	// 2.1 Проверка существования файла (ответ сервера содержит 200):
	if (file_exists($url)) return $url; else {
		trigger_error('ww ::: Файл \'' . $url . '\' не найден. Параметры: P=\'' . $P . '\', X=' . $X . ', D=' . ($D!=''?$D:"''") . ', extension=' . $ext . '.');
		return DG_SYS_ROOT_0 . DG_J_CORE . 'empty.php';
	}

// derfex? :: Плохо срабатывает
/////		  if (DG_MODE_RELEASE){ // derfex- :: На релизе не нужно.
/////			// derfex? :: Источник: http://habrahabr.ru/post/50846/
/////			$Headers = @get_headers($url);
/////			if (strpos('200', $Headers[0])) return $url; else {
/////				trigger_error('ww ::: Файл \'' . $url . '\' не найден. Параметры: P=\'' . $P . '\', X=' . $X . ', D=' . ($D!=''?$D:"''") . '.');
/////				return DG_CORE . 'empty.php';
/////			}
/////		  } else { // derfex- :: На релизе не нужно.
/////			if (file_exists($url)) return $url; else {
/////				trigger_error('ww ::: Файл \'' . $url . '\' не найден. Параметры: P=\'' . $P . '\', X=' . $X . ', D=' . ($D!=''?$D:"''") . '.');
/////			//	return DG_CORE . 'empty.php';
/////				return $url;
/////			}
/////		  }
}



//	PP (prepare path)
//
//	$P = '' — path,
//	$X = 0  — exertus (project, region),
//	$D = '' — datetime,
//	$ext = 'php' — extension
//
//	@result (str) — путь к подключаемому файлу.
function dgDPP($P = '', $X = 0, $D = '', $ext = 'php')
{
	// 0. Проверка входящих параметров:
//	$allowX = [
//		0=>1,23=>1,75=>1,
//		'mli'=>1,
//		'mhg'=>1,'mhg-adm'=>1,'mhg-ajax'=>1,
//		'vz'=>1,
//		'zabagro'=>1,'zabagro-adm'=>1,'zabagro-ajax'=>1,
//		'zm'=>1,'zm-gtn'=>1
//	];
//	if ($P == '' or !isset($allowX[$X])) {
//		trigger_error('ww ::: Неверные параметры: P=\'' . $P . '\', R=' . $X . ', D=' . ($D<>'' ? $D : "''") . '.');
//		return DG_CORE . 'empty.php';
//	}
	// 1. Интерпретация:
	$url = dgPP_interpretation($P, $X, $D, $ext);
	// 2. Предусмотрительность:
	// ??? Может попытка включить файл с чужого домена?
	// ??? Заменить слеши на DIRECTORY_SEPARATOR
	// ??? realpath?

	// 2.1 Проверка существования файла (ответ сервера содержит 200):
  if (DG_MODE_RELEASE){ // derfex- :: На релизе не нужно.
	// derfex? :: Источник: http://habrahabr.ru/post/50846/
	$Headers = @get_headers($url);
	if (strpos('200', $Headers[0])) return $url; else {
	//	trigger_error('ww ::: Файл \'' . $url . '\' не найден. Параметры: P=\'' . $P . '\', X=' . $X . ', D=' . ($D!=''?$D:"''") . '.');
		dgDV([
			'P'=>$P,
			'X'=>$X,
			'D'=>$D,
			'url'=>$url,
			'return'=>DG_CORE . 'empty.php'
		], 'Отладочная версия PP()');
		return DG_CORE . 'empty.php';
	}
  } else { // derfex- :: На релизе не нужно.
	if (file_exists($url)) {
		dgDV([
			'P'=>$P,
			'X'=>$X,
			'D'=>$D,
			'url'=>$url,
			'return'=>DG_CORE . 'empty.php'
		], 'Отладочная версия PP() :: файл существует');
		return $url;
	} else {
	//	trigger_error('ww ::: Файл \'' . $url . '\' не найден. Параметры: P=\'' . $P . '\', X=' . $X . ', D=' . ($D!=''?$D:"''") . '.');
		dgDV([
			'P'=>$P,
			'X'=>$X,
			'D'=>$D,
			'url'=>$url,
			'return'=>DG_CORE . 'empty.php'
		], 'Отладочная версия PP() :: файл не существует');
		return DG_CORE . 'empty.php';
	}
  }
}



//	Запускает PP() из массива
//
//	$a — array
//
//	@result (str) — путь к подключаемому файлу.
function dgPP_fromArray($a)
{
	if (isset($a[3])) return PP($a[0],$a[1],$a[2],$a[3]);
	if (isset($a[2])) return PP($a[0],$a[1],$a[2]);
	if (isset($a[1])) return PP($a[0],$a[1]);
	if (isset($a[0])) return PP($a[0]);
	// derfex?
}



// derfex- :: удалить хлам
// derfex+ :: добавить документацию, исправить описание ошибок



//ini_set('allow_url_include', 'On');
//include 'http://zab.16mb.com/index.php';
//readfile() ?



// 2.1 Проверка существования файла (ответ сервера содержит 200):
// derfex? :: Источник: http://habrahabr.ru/post/50846/
//$Headers = @get_headers($url);
//if (strpos('200', $Headers[0])) {}
// Вариант ещё быстрее: «…shutdown()'ить сокет после первой же строки ответа (с кодом) от сервера…»
//https://habrahabr.ru/post/50846/#comment_1339691
