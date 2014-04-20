<?php if(!defined('Z_KEY')) exit('Access denied !');

/**
 * Z-COSP (ZAMBELZ - CMS Open Source Project)
 * @package engine/core function
 * @license Open Source
 * @author Nanda . J . A
 * @copyright 2013
 */



/**
 * fungsi untuk menyertakan file
 */
if(!function_exists('load_file')) {

    function load_file($path, $file) {    
        if(!file_exists($path . $file)) {            
            die('<br />ERROR : ' . $file . ' not found on : ' . $path .'<br />');            
        } else {            
            require_once $path . $file;            
        }    
    }

}

/**
 * fungsi untuk membuat link default
 */
if(!function_exists('base_link_format')) {
    
    function base_link_format($link) {
        
        return 'index.php?page='.$link;
        
    }
    
}

/**
 * fungsi untuk mendapat tanggal dan jam system
 */
if(!function_exists('current_date_time')) {
    
    function current_date_time() {
        return date('Y-m-d') .' '. date('H:i:s', time());
    }
    
}

/**
 * fungsi untuk mengalihkan halaman
 */
if(!function_exists('redirect')) {
    
    function redirect($link) {
        return header('Location:'.$link);
    }
    
}

/**
 * fungsi untuk refresh halaman
 */
if(!function_exists('http_refresh')) {
    
    function http_refresh($link) {
        return '<meta http-equiv="refresh" content="0;url=http:'.$link.'">';
    }
    
}

/**
 * fungsi untuk load class
 */
if(!function_exists('load_class')) {
    
    function load_class($path, $filename, $class_name = '', $method = 'view', $params = '') {
        load_file($path.DS, $filename.'.php');
        
        if($class_name != '') {
            $filename = $class_name;
        }
        
        $class = ucfirst(strtolower($filename));
                
        if(!class_exists($class)) {
            die('<b>Error :</b> Class "'. $class .'" is not exists !');
        }
               
        $class = new $class;
        
        if(!method_exists($class, 'view')) {
            die('<b>Error :</b> Method "'.$method.'" on class "'. $class_name .'" is not exists');
        }
                
        $class->$method($params);
    }
    
}