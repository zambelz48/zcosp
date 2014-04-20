<?php if(!defined('Z_KEY')) exit('Access denied !');

/**
 * Z-COSP (ZAMBELZ - CMS Open Source Project)
 * @package engine
 * @license Open Source
 * @author Nanda . J . A
 * @copyright 2013
 *
 * Don't touch this, or i kill you gaaannnn...........
 */

error_reporting($conf['php']['error_reporting']);

define('ENGINE_PATH',   ROOT_PATH.str_replace("\\", "/", 'engine').DS);
define('MODULE_PATH',   ROOT_PATH.str_replace("\\", "/", 'module').DS);
define('FILE_PATH',     ROOT_PATH.str_replace("\\", "/", 'files').DS);
define('TEMP_PATH',     ROOT_PATH.str_replace("\\", "/", 'temp').DS);

define('IMG_SLIDER_PATH',       FILE_PATH.'images'.DS.'slider'.DS);
define('IMG_CLIENT_PATH',       FILE_PATH.'images'.DS.'client'.DS);

define('THEMES_ADMIN_PATH',     ROOT_PATH.str_replace("\\", "/", 'admin').DS.'themes'.DS);
define('THEMES_SITE_PATH',      ROOT_PATH.str_replace("\\", "/", 'themes').DS);

define('SITE_IMG_SRC',      './files/images/');
define('SITE_CAPTCHA_SRC',  './engine/component/captcha/captcha.php');

if(file_exists(ENGINE_PATH.'core'.DS.'function.php')) {    
    require_once ENGINE_PATH.'core'.DS.'function.php';        
} else {    
    die('"function" file not found on system !');
}

load_file(ENGINE_PATH.'database'.DS, 'Mysql.php');
load_file(ENGINE_PATH.'database'.DS, 'DB_Handler.php');
load_file(ENGINE_PATH.'database'.DS, 'SqlCommands.php');

// Database connection
DB_Handler::connect($conf['db']['db_name'],
                    $conf['db']['host'],
                    $conf['db']['user'],
                    $conf['db']['password']);

load_file(ENGINE_PATH.'core'.DS, 'model.php');
load_file(ENGINE_PATH.'core'.DS, 'controller.php');
load_file(ENGINE_PATH.'core'.DS, 'loader.php');

load_file(ENGINE_PATH.'plugin'.DS, 'plugin.php');

function &get_instance() {
    return Z_Controller::get_instance();
}