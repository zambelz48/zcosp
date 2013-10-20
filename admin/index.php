<?php define('Z_KEY', 1);

/**
 * Z-COSP (ZAMBELZ - CMS Open Source Project)
 * @package Admin Base
 * @license Open Source
 * @author Nanda . J . A
 * @copyright 2013
 */
 
ob_start('ob_gzhandler');        
session_start();
        
define('DS', DIRECTORY_SEPARATOR);

define('ROOT_PATH', str_replace("\\", "/", realpath(dirname(dirname(__FILE__)))) . DS);

if(file_exists(ROOT_PATH . 'engine' . DS . 'config' . DS . 'resources.php')) {    
    require_once ROOT_PATH . 'engine' . DS . 'config' . DS . 'resources.php';     
} else {
    die('path file not found on system !');
}

/*===========================================================================================*/
/* Start the engine brooo...
/*===========================================================================================*/
load_class(ENGINE_PATH, 'base_admin');

ob_end_flush();
?>