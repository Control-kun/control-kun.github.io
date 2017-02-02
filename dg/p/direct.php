<?php // Подключается к index.php в DG_ROOT
// Содержит направляющие параметры, чтобы держать несколько проектов на одном сайте.

// derfex? :: возможно будут какие-нибудь функции.



// До 160129 этот блок располагался в DG/0.php.
// DG_J_PRJ_DEMAND — константа фрагмента пути для определения общего корня проектов на сайте.
// DG_J_PRJ_ENGINE — константа фрагмента пути для определения папки dgEngine.
// Оба параметра используются в DG_*_ROOT_* для формирования остальных констант.
// Оба параметра могут быть равны пустой строке.
////////////////////////////////////////////////////////////////////////////////
// derfex?
//echo '<hr>' . $_SERVER['DOCUMENT_ROOT'] . '<hr>'; exit();
//define('DG_J_PRJ_DEMAND', '/mahagon'); // требование совместимости // '/projects/mahagon'
define('DG_J_PRJ_DEMAND', ''); // требование совместимости // '/derfex-projects/dgtz/demo.dgtz.ru/'
//define('DG_J_PRJ_DEMAND', '/local/templates/fortunum/'); // требование совместимости // '/derfex-projects/dgtz/demo.dgtz.ru/'
define('DG_J_PRJ_ENGINE', '/dg'); // папка dgEngine



// DG_*_ROOT_*
// Тут же определим константу корня dgEngine
////////////////////////////////////////////////////////////////////////////////
define('DG_SYS_ROOT_0', $_SERVER['DOCUMENT_ROOT'] . DG_J_PRJ_DEMAND . DG_J_PRJ_ENGINE . '/');
define('DG_SYS_ROOT_X', $_SERVER['DOCUMENT_ROOT'] . DG_J_PRJ_DEMAND . DG_J_PRJ_ENGINE . '/');
define('DG_SRC_ROOT_0',                             DG_J_PRJ_DEMAND . DG_J_PRJ_ENGINE . '/');
define('DG_SRC_ROOT_X',                             DG_J_PRJ_DEMAND . DG_J_PRJ_ENGINE . '/');
define('DG_NAV_ROOT',                               DG_J_PRJ_DEMAND                   . '/');



// Массив распределяющих параметров
////////////////////////////////////////////////////////////////////////////////
// TODO: Внимание! Требуется править массив в функции PP() (0.php). Реализовать обход на глобальной переменной или константе-массиве (PHP7).
// derfex- :: demo.dgtz.ru
$dgDirect = array(
	'q' => array(
		'exe' => 'frt-ajax', // идентификатор проекта, его папка
		'paths' => array(
		//	'home'        => DG_NAV_ROOT . 'mahagon/adm', // значение для константы DG_NAV_HOME (по умолчанию: DG_NAV_HOME==='#error')
		//	'aux src exe' => 'mhg',                       // идентификатор проекта (его папка) с дополнительными ресурсами
		//	'AJAX' => DG_NAV_ROOT . 'q/ajax.php',         // ссылка на обработчик AJAX-запросов
		//	'aux src exe adm' => 'mhg-adm',
		//	'referrer'    => 1 // указать ключ, когда нужно знать идентификатор проекта, с которого был отправлен запрос (осуществлён переход)
		),
		'TKIT' => array(
			'internal off' => 1,
			'shutdown'     => 1,
		)
	)
);



// derfex! :: Ключи $dgDirect отсортировать по убыванию длины строки



// Функция определения параметров, исходя из адреса
////////////////////////////////////////////////////////////////////////////////
function dgGetDirectInfo(&$dgDirect){ // derfex+ :: разбить на функции с return
	$q = $_SERVER['PHP_SELF']; // or $_SERVER['QUERY_STRING'];

	foreach ($dgDirect as $k => $v) {
		if (strpos($q, $k) === FALSE) continue;
	//	return array($k,$v);
		$r = array($k,$v);
		break;
	}

	if (isset($r)) {
		if (isset($dgDirect[$k]['paths']['referrer'])) {
			$q = $_SERVER['HTTP_REFERER'];
			foreach ($dgDirect as $k => $v) {
				if (strpos($q, $k) === FALSE) continue;
			//	return array($k,$v);
				$dgDirect[$r[0]]['paths']['referrer'] = $v['exe'];
				break;
			}
		}
		return $r;
	}
?>
<!DOCTYPE html>
<html>
<head>
<title>DG: Object not found!</title>
</head>

<body>
<h1>DG: Object not found!</h1>
<p>The requested URL was not found on this server.</p>

<h2>Error 404</h2>
</body>
</html>
<?php
	exit();
}



// Получаем распределяющую информацию о проекте
////////////////////////////////////////////////////////////////////////////////
$dgProject = dgGetDirectInfo($dgDirect); // derfex? :: плодить ли лишний массив
// Идентификатор проекта (региона) [число или строка], а также папка в %dgEngine%/p/:
$dgProjectDirectKey = $dgProject[0];
$dgProject          = $dgProject[1]['exe'];
define('DG_NAV_HOME', isset($dgDirect[$dgProjectDirectKey]['paths']['home']) ? $dgDirect[$dgProjectDirectKey]['paths']['home'] : '#error');



// derfex-
$dgDirect['zabagro/q']['paths']['referrer'] = 'zabagro-adm';
