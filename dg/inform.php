<?php
// Разработка сборщика информации основного файла (index.php).



/* derfex+ :: Добавить обработку по принципу:

Указывать в $dgDirect какие из файлов HIJK использовать: по умолчанию или свою версию.
Если свою — пробовать подгрузить. При отсутствии грузить по умолчанию с уведомлением.
Возможно, так проект работать не будет, но мы попытаемся.

В дальнейшем разделение на несколько файлов можно упразднить. Например, перенести код HIJK (из DG) в index.php.

/**/



// Подключение сборщика информации, индивидуального для проекта:
require 'p/'.$dgProject.'/inform.php';