<?php

date_default_timezone_set('utc');
define('APP_WD',  getcwd());

require_once 'classes/application.php';

$app=new application();
$app->run();

?>
