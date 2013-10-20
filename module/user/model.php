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
    
    public function get_all_user($mode = '') {
        parent::model('select');
        
        $this->db->select();
        $this->db->table($this->db_table);
        $this->db->where('id != "'.$_SESSION['id'].'"');
        
        $query = $this->db->build();
        
        if($mode == 'total_data') {
            return $this->db->num_rows($query);
        } else if($mode == 'all_records') {
            $no = 0;        
            while($user = $this->db->fetch_array($query)) {
                $data[] = array('no'            => $no,
                                'id'            => $user['id'],
                                'username'      => $user['username'],
                                'im_type'       => $user['im_type'],
                                'im_id'         => $user['im_id'],
                                'user_active'   => $user['user_active'],
                                'im_active'     => $user['im_active'],
                                'user_type'     => $user['user_type'],
                                'reg_date'      => $user['reg_date'],
                                'last_update'   => $user['last_update'],
                                'last_login'    => $user['last_login']);
                                
                $no++;
            }
            
            return $data;
        }
    }
    
    public function total_user() {
        parent::model('select');
        
        $this->db->select();
        $this->db->table($this->db_table);
        $this->db->where('id != "'.$_SESSION['id'].'"');
        
        $query = $this->db->build();
        
        return $this->db->num_rows($query);
    }
    
    public function get_user($id) {
        parent::model('select');
        
        $this->db->select();
        $this->db->table($this->db_table);
        $this->db->where('id = "'.$id.'"');
        
        $query = $this->db->build();
        
        return $this->db->fetch_array($query);
    }
    
    public function save_user() {
        parent::model('insert');
        
        $date = date("Y-m-d") .' '. date("H:i:s", time());        
        $values = array('username'      => $_POST['username'], 
                        'password'      => md5($_POST['password']), 
                        'im_type'       => $_POST['im_type'], 
                        'im_id'         => $_POST['im_id'], 
                        'user_active'   => $_POST['user_active'], 
                        'im_active'     => $_POST['im_active'],
                        'user_type'     => '1', 
                        'reg_date'      => $date, 
                        'last_update'   => '0000-00-00 00:00:00', 
                        'last_login'    => '0000-00-00 00:00:00');
        
        $this->db->table($this->db_table);
        $this->db->insert($values);
        
        return $this->db->build();       
    }
    
    public function update_user($id) {
        parent::model('update');
        
        $date = date("Y-m-d") .' '. date("H:i:s", time());
        $values = array('username'      => $_POST['username'],
                        'password'      => md5($_POST['password']),
                        'im_type'       => $_POST['im_type'],
                        'im_id'         => $_POST['im_id'],
                        'user_active'   => $_POST['user_active'],
                        'im_active'     => $_POST['im_active'],
                        'last_update'   => $date);
        
        $this->db->table($this->db_table);
        $this->db->update($values);
        $this->db->where('id = "'.$id.'"');
        
        return $this->db->build();
    }
    
    public function delete_user($id) {
        parent::model('delete');
        
        $this->db->table($this->db_table);
        $this->db->where('id = "'.$id.'"');
        
        return $this->db->build();
    }
    
}


?>