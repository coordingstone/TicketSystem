<?php
require_once (BASE_DIR . '/lib/smarty/Smarty.class.php');
class MySmarty
{
    private static $smarty;

    public static function getSmarty() {
        if (self::$smarty == null) {
            self::$smarty = new Smarty();
            self::$smarty->template_dir = BASE_DIR . '/templates';
            self::$smarty->compile_dir = BASE_DIR . '/lib/smarty/templates_c';
            self::$smarty->cache_dir = BASE_DIR . '/lib/smarty/cache';
            self::$smarty->config_dir = BASE_DIR . '/lib/smarty/configs';
        }
        return self::$smarty;
    }
}