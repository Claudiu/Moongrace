<?php

function load_core($class) {
    $file = 'Moongrace'.DIRECTORY_SEPARATOR.'Bootcamp'.DIRECTORY_SEPARATOR.$class.'.php';
    require_once($file);
}

spl_autoload_register('load_core');

$config = array();

$config_dir = APP . DIRECTORY_SEPARATOR . 'Configs' . DIRECTORY_SEPARATOR;
foreach (glob(sprintf('%s*', $config_dir)) as $key) require_once($key);
unset($config_dir);

new Application($config);
