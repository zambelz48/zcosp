<?php if(!defined('Z_KEY')) exit('Access denied !');

/**
 * Z-COSP (ZAMBELZ - CMS Open Source Project)
 * @package home_slider model
 * @license Open Source
 * @author Nanda . J . A
 * @copyright 2013
 */

class Home_slider_model extends Z_Model {
    
    private $db_table = 'home_slider';
    
    public function get_all_home_slider($get = '', $mode = '') {
        parent::model('select');
        
        $this->db->select();
        $this->db->table($this->db_table);
        
        if($get == 'activated') {
            $this->db->where('is_active = "Y"');
        }
        
        $query = $this->db->build();
        
        if($mode == 'total_data') {
            return $this->db->num_rows($query);
        } else if($mode == 'all_records') {
            while($hs = $this->db->fetch_array($query)) {
                if($hs['is_active'] == 'Y') {
                    $hs_status = 'Aktif';
                } else {
                    $hs_status = 'Non-aktif';
                }
                
                $data[] = array('id'            => $hs['id'], 
                                'id_product'    => $hs['id_product'], 
                                'image'         => $hs['image'], 
                                'is_active'     => $hs_status,
                                'created'       => $hs['created'],
                                'updated'       => $hs['updated']);
            }
            
            return $data;    
        }
    }
    
    public function get_home_slider($id) {
        parent::model('select');
        
        $this->db->select();
        $this->db->table($this->db_table);
        $this->db->where('id = "'.$id.'"');
        
        $query = $this->db->build();
        
        return $this->db->fetch_array($query);
    }
    
    public function save_home_slider($image) {
        parent::model('insert');
        
         $values = array(   'id_product'    => $_POST['id_product'],
                            'image'         => $image,
                            'is_active'     => $_POST['is_active']);
                        
        $this->db->table($this->db_table);
        $this->db->insert($values);
        
        return $this->db->build();
    }
    
    public function update_home_slider($id, $image) {
        parent::model('update');
        
         $values = array(   'id_product'    => $_POST['id_product'],
                            'image'         => $image,
                            'is_active'     => $_POST['is_active']);
                        
        $this->db->table($this->db_table);
        $this->db->update($values);
        $this->db->where('id = "'.$id.'"');
        
        return $this->db->build();
    }
    
    public function delete_home_slider($id) {
        parent::model('delete');
        
        $this->db->table($this->db_table);
        $this->db->where('id = "'.$id.'"');
        
        return $this->db->build();
    }
}

?>