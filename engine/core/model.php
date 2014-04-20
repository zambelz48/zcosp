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
    protected $sp;
    
    /**
     * Menentukan tipe operasi model
     * @param String $type = 'select', 'insert', 'update', 'delete', 'custom'
     * @access protected  
     */
    public function __construct() {
        $class_name = 'SqlCommands';
        if(!class_exists($class_name)) {
            die($class_name. ' class not found !');
        } else {
            $this->db = new SqlCommands();
        }
    }

}