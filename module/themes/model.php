<?php if(!defined('Z_KEY')) exit('Access denied !');

/**
 * Z-COSP (ZAMBELZ - CMS Open Source Project)
 * @package themes model
 * @license Open Source
 * @author Nanda . J . A
 * @copyright 2013
 */

class Themes_model extends Z_Model {
    
    private $db_table = 'themes';
    
    public function get_all_theme() {        
        parent::model('select');
        
        $this->db->select();
        $this->db->table($this->db_table);
        
        $query = $this->db->build();
        
        while($themes = $this->db->fetch_array($query)) {
            if($themes['is_active'] == 'Y') {
                $themes_status = 'Aktif';
            } else {
                $themes_status = 'Non-aktif';
            }
                
            $data[] = array('id'            => $themes['id'],
                            'theme_name'    => $themes['theme_name'],
                            'design'        => $themes['design'],
                            'is_active'     => $themes_status,
                            'created'       => $themes['created'],
                            'updated'       => $themes['updated']);
        }
        
        return $data;
    }
    
    public function set_active_theme($id) {        
        parent::model('update');
        
        $this->db->table($this->db_table);
        $this->db->update('');
        $this->db->where('id');
    }
    
    public function set_inactive_theme($id) {        
        parent::model('update');
        
        $this->db->update();
    }
    
    public function remove_theme($id) {        
        parent::model('delete');
        
    }
    
    public function install_theme() {        
        parent::model('insert');
        
    }
    
}


?>