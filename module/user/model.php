<?php if(!defined('Z_KEY')) exit('Access denied !');

/**
 * Z-COSP (ZAMBELZ - CMS Open Source Project)
 * @package user model
 * @license Open Source
 * @author Nanda . J . A
 * @copyright 2013
 */

class User_model extends Z_Model {

    private $db_table = 'administrator';

    public function get_rows() {
        $result = '';

        try {
            $query = $this->db->select($this->db_table, null, 'id != "'.$_SESSION['id'] .'"');
            $no = 0;

            while($row = $this->db->fetch($query)) {
                $result[] = array(
                    'no'            => $no,
                    'id'            => $row['id'],
                    'username'      => $row['username'],
                    'im_type'       => $row['im_type'],
                    'im_id'         => $row['im_id'],
                    'user_active'   => $row['user_active'],
                    'im_active'     => $row['im_active'],
                    'user_type'     => $row['user_type'],
                    'reg_date'      => $row['reg_date'],
                    'last_update'   => $row['last_update'],
                    'last_login'    => $row['last_login']
                );
                $no++;
            }
        } catch(Exception $e) {
            $result = $e->getMessage();
        }

        return $result;
    }

    public function get_count() {
        $query = $this->db->select($this->db_table, null, 'id != '.$_SESSION['id']);
        return $this->db->getCount($query);
    }

    public function get_user($id) {
        $query = $this->db->select($this->db_table, null, 'id='.$id);
        return $this->db->fetch($query);
    }
    
    public function save_user() {
        $values = array('username'      => $_POST['username'], 
                        'password'      => md5($_POST['password']), 
                        'im_type'       => $_POST['im_type'], 
                        'im_id'         => $_POST['im_id'], 
                        'user_active'   => $_POST['user_active'], 
                        'im_active'     => $_POST['im_active'],
                        'user_type'     => '1', 
                        'reg_date'      => current_date_time(),
                        'last_update'   => '0000-00-00 00:00:00', 
                        'last_login'    => '0000-00-00 00:00:00');
        
        return $this->db->insert($this->db_table, $values);
    }
    
    public function update_user($id) {
        $values = array('username'      => $_POST['username'],
                        'password'      => md5($_POST['password']),
                        'im_type'       => $_POST['im_type'],
                        'im_id'         => $_POST['im_id'],
                        'user_active'   => $_POST['user_active'],
                        'im_active'     => $_POST['im_active'],
                        'last_update'   => current_date_time());
        
        return $this->db->update($this->db_table, $values, 'id='.$id);
    }
    
    public function delete_user($id) {
       return $this->db->delete($this->db_table, 'id='.$id);
    }
    
}