<?php
/**
 * This is the set up file. It is responsible for initializing
 * the app and making sure that all the critical components
 * are set up.
 */

require_once "core/App.php";
require_once "core/Controller.php";
require_once "core/Config.php";
require_once "core/iModel.php";
require_once "core/Router.php";
require_once "core/Utilities.php";

// Auto load models
spl_autoload_register(function($class) {
    require_once 'models/' . $class . '.php';
});

?>
