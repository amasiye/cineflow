<?php
require_once "app/init.php";

$session    = new Session;
$db         = new Database($db_host, $db_user, $db_pass, $db_name);
$settings   = new Settings;
$app        = new App;
?>
