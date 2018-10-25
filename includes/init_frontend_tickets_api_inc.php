<?php
if (!empty($_SERVER['HTTP_HOST'])) {
    if (!empty($_SERVER['HTTPS'])) {
        define('CURRENT_HOST', 'https://' . $_SERVER['HTTP_HOST'] . '/');
    } else {
        define('CURRENT_HOST', 'https://' . $_SERVER['HTTP_HOST'] . '/');
    }
} else {
    define('CURRENT_HOST', '');
}
