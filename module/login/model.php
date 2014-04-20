<?php if(!defined('Z_KEY')) exit('Access denied !');

/**
 * Z-COSP (ZAMBELZ - CMS Open Source Project)
 * @package login model
 * @license Open Source
 * @author Nanda . J . A
 * @copyright 2013
 */

class Login_model extends Z_Model {

    public function user_login($access, $username, $password) {
        if($access == 'admin') {
            $db_table = 'administrator';
        } else if($access == 'customer') {
            $db_table = 'customer';
        }

        $query = $this->db->select(
            $db_table, 'id, username, password',
            'username = "'. $username .'" AND password = "'. $password .'"'
        );

        if($this->db->getCount($query) <= 0) {
            return 0;
        } else {
            $user = $this->db->fetch($query);
            $update_login_time = $this->update_time_login($db_table, $user['id']);

            if($access == 'admin') {
                if($update_login_time) {
                    $_SESSION['id']         = $user['id'];
                    $_SESSION['user_type']  = $access;
                    $_SESSION['username']   = $user['username'];
                    return 1;
                } else {
                    return 2;
                }
            } else if($access == 'customer') {
                if($user['blocked'] == 'N') {                                       
                    if($update_login_time) {
                        $_SESSION['id']         = $user['id'];
                        $_SESSION['user_type']  = $access;
                        $_SESSION['username']   = $user['username'];
                        return 1;
                    } else {
                        return 2;
                    }
                }
            }
        }
    }
    
    private function update_time_login($table, $id) {
       return $this->db->update($table, array('last_login' => current_date_time()), 'id='.$id);
    }
    
}