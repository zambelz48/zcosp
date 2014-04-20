<?php if(!defined('Z_KEY')) exit('Access denied !');

/**
 * Z-COSP (ZAMBELZ - CMS Open Source Project)
 * @package engine/database MySQL_Base
 * @license Open Source
 * @author Nanda . J . A
 * @copyright 2013
 */

class Mysql {
    
    private $connection;
    private $database;
    
    public function connection($host, $user, $password) {
        $this->connection = @mysql_connect($host, $user, $password);
        return $this->connection;        
    }
    
    public function select_db($db_name) {
        $this->database = @mysql_select_db($db_name, $this->connection);
        return $this->database;        
    }
    
    public function query($params) {        
        return @mysql_query($params);
    }
    
    public function fetch_array($params) {        
        return @mysql_fetch_array($params);        
    }
    
    public function fetch_object($params) {        
        return @mysql_fetch_object($params);        
    }
    
    public function fetch_row($params) {        
        return @mysql_fetch_row($params);        
    }
    
    public function fetch_assoc($params) {        
        return @mysql_fetch_assoc($params);        
    }
    
    public function free_result($params) {        
        return @mysql_free_result($params);        
    }
    
    public function num_rows($params) {        
        return @mysql_num_rows($params);        
    }
    
    public function error() {        
        return @mysql_error();        
    }
    
    public function close() {        
        return @mysql_close($this->connection);        
    }
    
    public function connection_handler() {        
        if(!$this->connection) {            
            return $this->connection_msg('conn_failed');        
        } else {
            if(!$this->database) {        
                return $this->connection_msg('db_failed');        
            }        
        }        
    }
    
    private function connection_msg($msg) {        
        switch($msg) {
            case 'conn_failed' :                
                echo '<title>'. EXCEPTION_ERROR_CONNECTION .'</title>'. EXCEPTION_ERROR_CONNECTION .' ! <br />
                Error : '. $this->error() .'<br />';
                return $this->close();            
            break;
            
            case 'db_failed' :            
                echo '<title>'. EXCEPTION_ERROR_DATABASE .'</title>'. EXCEPTION_ERROR_DATABASE .' ! <br />
                Error : '. $this->error() .'<br />';
                return $this->close();            
            break;
            
            default :            
            break;
        }        
    }
    
}

?>