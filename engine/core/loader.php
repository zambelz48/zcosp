<?php if(!defined('Z_KEY')) exit('Access denied !');

/**
 * Z-COSP (ZAMBELZ - CMS Open Source Project)
 * @package engine/core loader
 * @license Open Source
 * @author Nanda . J . A
 * @copyright 2013
 */
 
class Z_Loader {
    
    /**
     * Fungsi untuk menyertakan model
     * dan otomatis menginstansiasi model yang di sertakan
     * @access public
     **/ 
	public function model($model_name, $object = '') {        
        $z =& get_instance();
        
        if($object == '') {
            $object = $model_name;
        } 
        
        load_file(MODULE_PATH.$model_name.DS, 'model.php');
        
        $model = ucfirst(strtolower($model_name));
        $class = $model . '_model';
        
        if(!class_exists($class)) {
            die('Model : "' . $class . '" not found !');         
        }
                
        $z->$object = new $class;
    }
}