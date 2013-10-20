<?php if(!defined('Z_KEY')) exit('Access denied !');

/**
 * Z-COSP (ZAMBELZ - CMS Open Source Project)
 * @package engine
 * @license Open Source
 * @author Nanda . J . A
 * @copyright 2013
 */

//Production 
//error_reporting(0);

//Development
error_reporting(E_ALL);

define('ZAMBELZ_VERSION', '0.1');

define('ENGINE_PATH',   ROOT_PATH.str_replace("\\", "/", 'engine').DS);
define('MODULE_PATH',   ROOT_PATH.str_replace("\\", "/", 'module').DS);
define('FILE_PATH',     ROOT_PATH.str_replace("\\", "/", 'files').DS);
define('TEMP_PATH',     ROOT_PATH.str_replace("\\", "/", 'temp').DS);

define('IMG_PATH',                  FILE_PATH.'images'.DS);
define('IMG_PRODUCT_PATH',          IMG_PATH.'product'.DS);
define('IMG_PRODUCT_CATEGORY_PATH', IMG_PATH.'product_category'.DS);
define('IMG_BRAND_PATH',            IMG_PATH.'brand'.DS);
define('IMG_BANNER_PATH',           IMG_PATH.'banner'.DS);
define('IMG_SLIDER_PATH',           IMG_PATH.'slider'.DS);

define('IMG_CUSTOMER_PATH',         IMG_PATH.'customer'.DS);

define('THEMES_SITE_PATH',      ROOT_PATH.str_replace("\\", "/", 'themes').DS);
define('THEMES_ADMIN_PATH',     ROOT_PATH.str_replace("\\", "/", 'admin').DS.'themes'.DS);
define('THEMES_CUSTOMER_PATH',  ROOT_PATH.str_replace("\\", "/", 'customer').DS.'themes'.DS);

define('SITE_IMG_SRC',  './files/images/');
define('SITE_CAPTCHA_SRC',  './engine/component/captcha/captcha.php');

if(file_exists(ENGINE_PATH.'core'.DS.'function.php')) {    
    require_once ENGINE_PATH.'core'.DS.'function.php';        
} else {    
    die('function file not found on system !');    
}

load_file(ENGINE_PATH.'languages'.DS, 'languages.php');

load_file(ENGINE_PATH . 'database' . DS, 'MySQL_Base.php');
load_file(ENGINE_PATH . 'database' . DS, 'DB_Handler.php');
load_file(ENGINE_PATH . 'database' . DS, 'SQL_Builder.php');

//koneksi database
DB_Handler::get_instance();

load_file(ENGINE_PATH . 'core' . DS, 'model.php');
load_file(ENGINE_PATH . 'core' . DS, 'controller.php');
load_file(ENGINE_PATH . 'core' . DS, 'loader.php');

load_file(ENGINE_PATH . 'plugin' . DS, 'plugin.php');

function &get_instance() {
    return Z_Controller::get_instance();
}

?>