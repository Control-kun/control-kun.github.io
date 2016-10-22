<?php // AJAX: Заключение для обработчика AJAX-запросов.
// require_once $_SERVER['DOCUMENT_ROOT'].'/vz.php';



////        // Закрываем соединение:
////        $dgSQL->close();



// Вывод ошибок.
////////////////////////////////////////////////////////////////////////////////
// derfex-
//echo '<hr>';
//include PP('_fn/fn_dgDataIntoTable'); // derfex?
//dgDebugCSS();
$dgTKIT->outputLog('',TRUE);



// Помещаем информацию из буфера выбора в строковую переменную.
////////////////////////////////////////////////////////////////////////////////
if ($bool_ob) {
    $dgOutputBuffer = ob_get_contents();
    ob_end_clean();
}


$dgOutputBuffer = 'has been cleared'; // FIXME: derfex-



// Сборка массива, преобразование в JSON, вывод.
////////////////////////////////////////////////////////////////////////////////
$JSONstr = array('Data'=>$dgData,'Notify'=>$dgTKIT->getNotify(),'OB'=>$dgOutputBuffer);
//$JSONstr = array('Data'=>$Data,'Notify'=>$Notify);
//if ($UserRight===-1) $JSONstr['OB']=$OutputBuffer; // derfex? :: права для отладки
$JSONstr = json_encode($JSONstr);
echo $JSONstr;
