<?php if(!defined('Z_KEY')) exit('Access denied !');

/**
 * Z-COSP (ZAMBELZ - CMS Open Source Project)
 * @package login model
 * @license Open Source
 * @author Nanda . J . A
 * @copyright 2013
 */

class Login_model extends Z_Model {
    
    public function user_login($access, $username, $password, $redirect, $msg_not_found = '', $msg_user_blocked = '') {
        parent::model('select');
        
        if($access == 'admin') {
            $db_table = 'administrator';
        } else if($access == 'customer') {
            $db_table = 'customer';
        }
        
        $this->db->select();
        $this->db->table($db_table);
        $this->db->where('username = "'. $username .'"');
        $this->db->where_and('password = "'. $password .'"');
        
        $query = $this->db->build();
        
        if($this->db->num_rows($query) == 0) {
            return $msg_not_found;
        } else {
            $user = $this->db->fetch_array($query);
            
            if($access == 'admin') {
                $_SESSION['id'] = $user['id'];  
                $_SESSION['user_type'] = $access;            
                $_SESSION['username'] = $user['username'];
                
                $this->update_time_login($db_table, $user['id']);
                
                redirect($redirect);    
            } else if($access == 'customer') {
                if($user['blocked'] == 'N') {                                       
                    $_SESSION['id'] = $user['id'];  
                    $_SESSION['user_type'] = $access;            
                    $_SESSION['username'] = $user['username'];
                    
                    $this->update_time_login($db_table, $user['id']);
                    
                    redirect($redirect);
                }
            }
        }
    }
    
    public function update_time_login($table, $id) {
        parent::model('custom');
        
        $time = date("Y:m:d") .' '. date("H:i:s",time());
        $this->db->custom('UPDATE '.$table.' SET last_login = "'.$time.'" WHERE id = '. $id);        
        return $this->db->build();
    }
    
}


?>