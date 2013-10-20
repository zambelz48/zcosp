<?php if(!defined('Z_KEY')) exit('Access denied !');

/**
 * Z-COSP (ZAMBELZ - CMS Open Source Project)
 * @package engine/core model
 * @license Open Source
 * @author Nanda . J . A
 * @copyright 2013
 */

class Z_Model {
    
    protected $db;
    
    /**
     * Menentukan tipe operasi model
     * @param String $type = 'select', 'insert', 'update', 'delete', 'custom'  
     * @access protected  
     */
    protected function model($type) {        
        if(!class_exists('SQL_Builder')) {
            die('SQL_Builder class not found !');
        }
        
        $this->db = new SQL_Builder($type);      
    }
    
}

?>