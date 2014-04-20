<?php if(!defined('Z_KEY')) exit('Access denied !');

/**
 * Z-COSP (ZAMBELZ - CMS Open Source Project)
 * @package engine/database DB_Handler
 * @license Open Source
 * @author Nanda . J . A
 * @copyright 2013
 */


class DB_Handler extends Mysql {
    
    private static $instance = null;

    private function __construct($db_name, $host, $user, $password) {
        parent::connection($host, $user, $password);
        parent::select_db($db_name);
        parent::connection_handler();
    }
    
    public static function connect($db_name, $host, $user, $password) {
        if(self::$instance == null) {
            self::$instance = new self($db_name, $host, $user, $password);
        } else {            
            die('cannot instantiate two times !');        
        }
        
        return self::$instance;        
    }
    
}

?>