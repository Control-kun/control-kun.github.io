<?php
// Разработка завершающей части основного файла (index.php), выполняющей дополнительные действия.



/* derfex+ :: Добавить обработку по принципу:

Указывать в $dgDirect какие из файлов HIJK использовать: по умолчанию или свою версию.
Если свою — пробовать подгрузить. При отсутствии грузить по умолчанию с уведомлением.
Возможно, так проект работать не будет, но мы попытаемся.

В дальнейшем разделение на несколько файлов можно упразднить. Например, перенести код HIJK (из DG) в index.php.

/**/



// Подключение завершающей части, выполняющей дополнительные действия, индивидуальной для проекта:
require 'p/'.$dgProject.'/keeper.php';
