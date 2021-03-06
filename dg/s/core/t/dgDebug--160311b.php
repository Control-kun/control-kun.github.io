<?php

// derfex+
// get_defined_vars()

function dgDebugCSS(){ ?>
	<style type="text/css">
		[data-dg-debug]{max-width:100%;overflow-x:auto;font-family:Consolas,monospace;font-size:14px;background-color:#14171A;color:#fff}
		[data-dg-debug] ::selection      {background:#035;color:#fc0}
		[data-dg-debug] ::-moz-selection {background:#035;color:#fc0}
		[data-dg-debug] h6{margin:0;font-size:1.4em;line-height:1.3em}
		[data-dg-debug] h6>*{font-size:.5em}
		[data-dg-debug="var_dump"]{padding:1em 0}
		[data-dg-debug="var_dump"] mark{font-size:1em;font-style:normal;background:#fc0;line-height:120%}
		[data-dg-debug="var_dump"] pre{max-width:100%;overflow-x:auto;margin:0;padding:5px;line-height:120%}
		[data-dg-debug="wrt"] p{margin:0;padding:0}

		.dg-DataIntoTable{border-collapse:collapse;border-spacing:0}
		.dg-DataIntoTable th,.dg-DataIntoTable td{border:1px solid #DDD;padding:3px 5px}
		.dg-DataIntoTable tbody tr:nth-child(odd){background:#EEE}
	</style>
<?php }

function dgDebugStart(){ ?>
<!DOCTYPE html>
<html lang="ru-RU">
 <head>
	<title>Отладка «Виртуозно»</title>
	<meta http-equiv="Content-Type" content="text/html; Charset=utf-8">
	<meta name="Robots"             content="NOINDEX,NOFOLLOW,NOARCHIVE">
	<link rel="shortcut icon" href="/favicon.ico">
<?php dgDebugCSS()?>
 </head>
 <body>
<?php }



	function dgDebugHeader() {
		$dbt=debug_backtrace();
	//	$dbt=$dbt[1] or $dbt[2];
		$dbt_file = $dbt[1];
		$dbt_func = (isset($dbt[2])) ? $dbt[2] : array('function'=>'GLOBAL CONTEXT');

		$info[0] = '';
		$info['fullpath'] = $dbt_file['file'];
		$info['path']     = str_replace('\\', '/', substr($dbt_file['file'], strpos($dbt_file['file'], $_SERVER['SERVER_NAME'])));
		$info['file']     = pathinfo($dbt_file['file'], PATHINFO_BASENAME);
		$info['line']     = $dbt_file['line'];
		$info['class']    = isset($dbt_func['class']) ? $dbt_func['class'] : '';
		$info['type']     = isset($dbt_func['type'])  ? $dbt_func['type']  : '';
		$info['function'] = $dbt_func['function'];
		$info['object']   = isset($dbt_func['object'])? $dbt_func['object']: '';

	//	$obj = $info['object']=='' ? '' : '<br>[obj]: '.$info['object'];

		$info[0] = '<mark>'
			. '<span title="'.$info['path'].'">[file]: '.$info['file'].'</span> [line]: '.$info['line']
			. '<br>[fn]: '.$info['class'].$info['type'].$info['function']
	//		. $obj
			. '</mark>';
		return $info;
	}



	function dgDump($var,$title='') {
		$info=dgDebugHeader();
		echo '<div data-dg-debug="var_dump">';
		 echo '<h6>'.$title.':</h6>';
		 echo $info[0];
		 echo '<pre>';print_r($var);echo '</pre>';
		echo '</div>';
	}

	function dgVDump($var,$title='') {
		$info=dgDebugHeader();
		echo '<div data-dg-debug="var_dump">';
		 echo '<h6>'.$title.':</h6>';
		 echo $info[0];
		 echo '<pre>';var_dump($var);echo '</pre>';
		echo '</div>';
	}

	function dgDX($var,$title='') {
		$info=dgDebugHeader();
		echo '<div data-dg-debug="var_export">';
		 echo '<h6>'.$title.':</h6>';
		 echo $info[0];
		 echo '<pre>';var_export($var);echo '</pre>';
		echo '</div>';
	}


	function dgDwrt($str, $title='') {
		$title = ($title==='') ? '' : '<h6>'.$title.':</h6>';
		echo '<div data-dg-debug="wrt">';
		 echo $title;
		 echo '<p>';print_r($str);echo '</p>';
		echo '</div>';
	}


	function dgDreq($title='dgDreq::get_included_files()') {
		dgDump(get_included_files(),$title);
	}



	function dgConvertMemory($size)
	{
		// @ используется для подавления вывода PHP-ошибок. Использовать в других функциях не рекомендуется.
		$unit=array('b','Kb','Mb','Gb','Tb','Pb');
		return @round($size/pow(1024,($i=floor(log($size,1024)))),2).' '.$unit[$i];
	}

	function dgMemory()
	{ ?><table><tr><td><?php echo dgConvertMemory(memory_get_usage())?></td><td><?php echo dgConvertMemory(memory_get_usage(true))?></td></tr></table><?php }
