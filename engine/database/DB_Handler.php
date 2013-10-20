<?php if(!defined('Z_KEY')) exit('Access denied !');

/**
 * Z-COSP (ZAMBELZ - CMS Open Source Project)
 * @package engine/database DB_Handler
 * @license Open Source
 * @author Nanda . J . A
 * @copyright 2013
 */
        

class DB_Handler extends MySQL_Base {
    
    private static $instance = null;
    private $db_name;
    
    private function __construct() {
        require_once ENGINE_PATH . 'config' . DS . 'database.php';
        $this->db_name = $db['db_name'];
        return self::connect($db['host'], $db['user'], $db['password']);        
    }
    
    public static function get_instance() {        
        if(self::$instance == null) {            
            self::$instance = new self();            
        } else {            
            die('cannot instantiate two times !');        
        }
        
        return self::$instance;        
    }
    
    public function connect($host, $user, $password) {
        parent::connect($host, $user, $password);
        parent::select_db($this->db_name);
        parent::connection_handler();        
    }
    
}

?>