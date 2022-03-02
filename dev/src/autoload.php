<?php
/**
 * Created by PhpStorm.
 * User: carly
 * Date: 02.03.2022
 * Time: 22:31
 */

define('DIR',  __DIR__);
define('TYPES',  DIR.'/Types');

spl_autoload_register(function ($class) {
    if (file_exists(TYPES . '/' . $class . '.php')) {
        require_once TYPES . '/' . $class . '.php';
    }
});
