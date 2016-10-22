<?php // Класс для обработки исключительных ситуаций.
//require_once $_SERVER['DOCUMENT_ROOT'].'/vz.php';



/* Класс для обработки исключительных ситуаций.
“ToKeepInTouch” переводится, как «Держать в курсе», «Оставаться на связи». 

Параметры конструктора: —

Версия 151005
• __construct — устанавливает пользовательский обработчик ошибок: err_handler().
• err_handler() — обработчик ошибок.
• $Log — массив с ошибками и исключениями.
• log() — Записывает возникающие ошибки в $Log.
• outputLog() — вывод $Log. Пока vzVDump().

	↓↓↓

Версия 151022
• $Notify — массив с уведомлениями.
• notify() — накапливает уведомления в $Notify.
• getNotify() — возвращает массив уведомлений.

	↓↓↓

Задокументировано 151108
• Вызов с помощью trigger_error(GROUP . ' ::: ' . MESSAGE), где GROUP принимает значения:
'ss' (success)
'ww' (warning)
'ee' (error)
'ii' (information)
'xx' (исключения) — ?
• Ошибки, исключения и вызовы trigger_error() аккумулируются в $Log.
• Чтобы показать уведомление пользователю, значение GROUP должно принимать значение с 'n':
'sn' (success)
'wn' (warning)
'en' (error)
'in' (information)
'xn' (исключения) — ?

	↓↓↓

Версия 151108
• getNotify() — возвращает массив уведомлений, выбирая из $Log.
• notify() — удалено. Используется trigger_error(_n ::: Текст уведомления).

	↓↓↓

Версия 160131
• onShutdown() — сработывает при завершении работы скрипта.
• fatal_err_handler() — обработывает Fatal Error.
• __construct() теперь регистрирует функцию onShutdown().
• getErrHandler() → getPrevErrHandler(),
  getExcHandler() → getPrevExcHandler().

	↓↓↓

Версия 160208
• __construct($case=NULL) — конструктор теперь принимает параметр-массив:
— $this->Case['internal off'] — true: Не запускаем внутренний обработчик ошибок PHP;
— $this->Case['shutdown']     — true: Регистрируем функцию срабатывающую по завершению работы скрипта;

	↓↓↓

	???

○ prev_exc_handler
○ debug_backtrace()
○ filter для outputLog()
○ Внесение уведомлений в БД
○ Внесение уведомлений в файл (журнал)
○ Отправка уведомлений на почту

*/



class dgToKeepInTouchService
{
 private $prev_err_handler;
 private $prev_exc_handler;
 public function getPrevErrHandler(){return $this->prev_err_handler;}
 public function getPrevExcHandler(){return $this->prev_exc_handler;}

 private $Log = array();
 private $Notify = array(); // derfex+ :: используется, но заполняется заново при повторном выводе, причём элементы повторяются.
 private $Case = array();



 public function __construct($case=NULL) {
	$this->Case['internal off'] = isset($case['internal off']) ? $case['internal off'] : true; // internal error handler
	$this->Case['shutdown']     = isset($case['shutdown'])     ? $case['shutdown']     : true;

	$this->prev_err_handler = set_error_handler(array($this, 'err_handler'));
//	$this->prev_exc_handler = set_exception_handler(array($this, 'vzErrorHandler'));

	if ($this->Case['shutdown']) register_shutdown_function(array($this, 'onShutdown'));
 }



// Функция обработки ошибок.
// src1
////////////////////////////////////////////////////////////////////////////////
 public function err_handler($errno, $errstr, $errfile, $errline, $errcontext = NULL) {
	// в случае неудачи [ return false; ], чтобы передать обработку PHP.
	$e = array('t'=>0,'n'=>0,'f'=>0,'l'=>0,'c'=>0,'g'=>0,'m'=>0);unset($e['c']);

	$e['t'] = $_SERVER['REQUEST_TIME']; // new DateTime;
	$e['n'] = $errno;
	$parts_msg = explode(' ::: ', $errstr);
	$e['m'] = (count($parts_msg)===2) ? trim($parts_msg[1]) : trim($errstr);
	$e['g'] = (count($parts_msg) > 1) ? trim($parts_msg[0]) : NULL;
	$e['f'] = $errfile;
	$e['l'] = $errline;
//	$e['c'] = $errcontext;
	$e['f'] = str_replace('\\', '/', substr($e['f'], strpos($e['f'], $_SERVER['SERVER_NAME'])));

	$this->log($e);

////		$trace = debug_backtrace();
////		trigger_error(
////			'Неопределенное свойство в __get(): ' . $name .
////			' в файле ' . $trace[0]['file'] .
////			' на строке ' . $trace[0]['line'],
////			E_USER_NOTICE);



	//	if (!(error_reporting() & $errno)) {
	//		// Этот код ошибки не включен в error_reporting
	//		return;
	//	}
if (false) {
	switch ($errno) {
	case E_USER_ERROR:
	//	echo "<b>My ERROR</b> [$errno] $errstr<br />\n";
	//	echo "  Фатальная ошибка в строке $errline файла $errfile";
	//	echo ", PHP " . PHP_VERSION . " (" . PHP_OS . ")<br />\n";
	//	echo "Завершение работы...<br />\n";
		exit(1);
		break;

	case E_USER_WARNING:
	//	echo "<b>My WARNING</b> [$errno] $errstr<br />\n";
		break;

	case E_USER_NOTICE:
	//	echo "<b>My NOTICE</b> [$errno] $errstr<br />\n";
		break;

	default:
	//	echo "Неизвестная ошибка: [$errno] $errstr<br />\n";
		break;
	}
}

	return $this->Case['shutdown'];

	return false; // derfex-
	// / * Не запускаем внутренний обработчик ошибок PHP * /
	return true;
 }



// Функция записи уведомления в Log.
////////////////////////////////////////////////////////////////////////////////
 private function log($data) {
	$this->Log[] = $data;
 }



// Функция отображения на экране информации из лога.
// src1
////////////////////////////////////////////////////////////////////////////////
 public function outputLog($filter='', $necessarily=FALSE) {
	// $filter — строка, включающая любые символы из множества [tnmgflc]

	if ($this->Log or $necessarily)
		if (function_exists('dgNTT_Table'))
			echo dgNTT_Table($this->Log);
		elseif (function_exists('dgDV'))
			dgDV($this->Log,'Журнал ошибок');
		else
			var_dump($this->Log);
 }



// Возвращает массив уведомлений.
////////////////////////////////////////////////////////////////////////////////
 public function getNotify($all=FALSE){
//	if ($this->Log) {
		foreach ($this->Log as $k => $v) {
			if ($v['g'] === 'sn' || $v['g'] === 'wn' || $v['g'] === 'en' || $v['g'] === 'in')
				$this->Notify[] = !$all ? array('g' => $v['g'][0], 'm' => $v['m']) : $v;
		}
//	}
	return $this->Notify; // derfex? :: Нет обнуления, значит уведомления при повторном вызове будут повторяться.
// derfex+ :: защита: здесь или при выводе?
 }



// Срабатывает при завершении работы скрипта.
////////////////////////////////////////////////////////////////////////////////
 public function onShutdown(){
 	/* derfex+ :: другие действия при завершении работы скрипта */


	$last_error = error_get_last();
	if ($last_error['type'] === E_ERROR) {

		self::err_handler(E_ERROR, $last_error['message'], $last_error['file'], $last_error['line']);
	}

	if (DG_MODE_DEBUG) {
		dgDebugCSS();
		self::outputLog();
		dgDF();
	}
 }



 public function fatal_err_handler($errno, $errstr, $errfile, $errline, $errcontext){
	$this->err_handler($errno, $errstr, $errfile, $errline, $errcontext);
 }

} // /dgToKeepInTouchService





/* Источники информации:
• src1 :: php.net/manual/ru/function.trigger-error.php#refsect1-function.trigger-error-notes
Внимание! HTML-сущности в error_msg@trigger_error не экранированы.
Чтобы сообщение можно было отобразить в браузере,
преобразовать его функцией htmlentities().

*/



/* Используемые определения:
• Уведомление — совокупность информации, возникающая в результате обработки
  (ee) ошибки,
  (ww) предупреждения,
  (ss) успешного выполнения,
  (ii) информационного сообщения или
  (xx) исключения.
• Лог — журнал, аккумулирующий в себе уведомления.

*/
