<?php
// Основные переменные для возврата значений.
////////////////////////////////////////////////////////////////////////////////
$dgData = $dgNotify = array(); $dgOutputBuffer = ''; // derfex? :: в конце 'Notify'=>$dgTKIT->getNotify() → нужен ли $dgNotify?



// Принимаем входящие параметры. Нужна проверка на безопасность.
////////////////////////////////////////////////////////////////////////////////

$jsJSONstr=dgDataReception('JSONstr');
// TODO: Нужна проверка на безопасность.
dgDebugCSS();
dgDV($jsJSONstr);



// Нам понадобятся функции:
////////////////////////////////////////////////////////////////////////////////



// Запросы и операции выполняются, если получены входящие параметры.
////////////////////////////////////////////////////////////////////////////////
if ($jsJSONstr) {



    // Перечень файлов, обрабатывающих запросы в зависимости от переданных опций:
    ////////////////////////////////////////////////////////////////////////////////
    $Missions = array(
        'form:phonecall' => 'ds/requestAPhoneCall'
    );

    // Расшифровываем послание.
    ////////////////////////////////////////////////////////////////////////////////
    $JSONdata = json_decode($jsJSONstr, true);
    dgDV($JSONdata,'$JSONdata');
    $Input = isset($JSONdata['Data']) ? $JSONdata['Data'] : NULL;
    // TODO: derfex+ :: проверка, что приняли



    // Проверяем миссию запроса.
    ////////////////////////////////////////////////////////////////////////////////
    $MissionAllowed=FALSE;
    foreach($Missions as $k_Missions => $v_Missions) { // derfex? :: isset
        if($JSONdata['Mission']==$k_Missions) {
            $MissionAllowed=TRUE;
//			echo 'Миссия началась.<br>';
            include PP($v_Missions, $dgProject);
            //dgVDump($k);
            //dgVDump($v);
            //	$JSONdata[$replKeys[$k]] = $v;
            //$JSONdata[$replKeys[$v]] = $JSONdata[$replKeys[$k]];
            break 1; // Выйти только из конструкции foreach.
        } else {
            $MissionAllowed=FALSE;
            // Миссия провалена
        }
    }

    if(!$MissionAllowed) echo 'Миссия провалена.<br>';
} else { trigger_error('en ::: Данные не верны'); }
