<?php
define('BASE_DIR', dirname(__FILE__, 2));
spl_autoload_register('autoloader');

function autoloader($classname) {
    include_once BASE_DIR . '/' . 'classes/mysmarty' . '.class.php';
}

$smarty = MySmarty::getSmarty();