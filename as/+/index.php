<?php
$domain = 'http://frt/as';
file_put_contents('../../index.html',      file_get_contents($domain), LOCK_EX);
file_put_contents('../../components.html', file_get_contents($domain.'/components'), LOCK_EX);
