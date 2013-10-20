<?php if(!defined('Z_KEY')) exit('Access denied !');

/**
 * Z-COSP (ZAMBELZ - CMS Open Source Project)
 * @package engine/lang/ languages
 * @license Open Source
 * @author Nanda . J . A
 * @copyright 2013
 */

require_once ENGINE_PATH.'config'.DS.'languages.php';

$default = trim(strtolower($lang['site']));

load_file(ENGINE_PATH.'languages'.DS.$default.DS, 'lang.php');

?>