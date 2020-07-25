<?php
// Define path
const DS = DIRECTORY_SEPARATOR;

defined('APPLICATION_PATH') || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '../../../app'));
define('MODEL_PATH', APPLICATION_PATH . DS . 'model' . DS);
define('VIEW_PATH', APPLICATION_PATH . DS . 'view' . DS);
define('CONTROLLER_PATH', APPLICATION_PATH . DS . 'controller' . DS);
define('LIB_PATH', APPLICATION_PATH . DS . 'lib' . DS);

/* $config = [
    'MODEL_PATH' => APPLICATION_PATH . DS . 'model' . DS,
    'VIEW_PATH' => APPLICATION_PATH . DS . 'view' . DS,
    'CONTROLLER_PATH' => APPLICATION_PATH . DS . 'controller' . DS,
    'LIB_PATH' => APPLICATION_PATH . DS . 'lib' . DS,
    //'DATA_PATH' => APPLICATION_PATH . DS . 'data' . DS,
]; */