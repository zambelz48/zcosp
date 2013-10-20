<?php if(!defined('Z_KEY')) exit('Access denied !');

/**
 * Z-COSP (ZAMBELZ - CMS Open Source Project)
 * @package banner model
 * @license Open Source
 * @author Nanda . J . A
 * @copyright 2013
 */

class Banner_model extends Z_Model {
    
    private $db_table = 'banner';
    
    public function get_all_banner($view = '', $mode = '') {
        parent::model('select');
        
        $this->db->select();
        $this->db->table($this->db_table);
        
        if($view == 'active') {
            $this->db->where('is_active = "Y"');
        }
        
        $query = $this->db->build();
        
        if($mode == 'total_data') {
            return $this->db->num_rows($query);
        } else if($mode == 'all_records') {
            while($banner = $this->db->fetch_array($query)) {
                if($banner['is_active'] == 'Y') {
                    $banner_status = 'Aktif';
                } else {
                    $banner_status = 'Non-aktif';
                }
                
                $data[] = array('id'            => $banner['id'],
                                'name'          => $banner['name'],
                                'image'         => $banner['image'],
                                'link'          => $banner['link'],
                                'description'   => $banner['description'],
                                'location'      => $banner['location'],
                                'is_active'     => $banner_status,
                                'created'       => $banner['created'],
                                'updated'       => $banner['updated']);
            }
            
            return $data;
        }
    }
    
    public function get_banner($id) {
        parent::model('select');
        
        $this->db->select();
        $this->db->table($this->db_table);
        $this->db->where('id = "'.$id.'"');
        
        $query = $this->db->build();
        
        return $this->db->fetch_array($query);
    }
    
    public function save_banner($image) {
        parent::model('insert');
        
        $date = date("Y-m-d") .' '. date("H:i:s", time());
        
        $values = array('name'          => $_POST['name'],
                        'image'         => $image,
                        'link'          => $_POST['link'],
                        'description'   => $_POST['description'],
                        'location'      => $_POST['location'],
                        'is_active'     => $_POST['is_active'],
                        'created'       => $date,
                        'updated'       => '0000-00-00 00:00:00');
        
        $this->db->table($this->db_table);
        $this->db->insert($values);
        
        return $this->db->build();
    }
    
    public function update_banner($id, $image) {
        parent::model('update');
        
        $date = date("Y-m-d") .' '. date("H:i:s", time());
        
        $values = array('name'          => $_POST['name'],
                        'image'         => $image,
                        'link'          => $_POST['link'],
                        'description'   => $_POST['description'],
                        'location'      => $_POST['location'],
                        'is_active'     => $_POST['is_active'],
                        'updated'       => $date);
        
        $this->db->table($this->db_table);
        $this->db->update($values);
        $this->db->where('id = "'.$id.'"');
        
        return $this->db->build();
    }
    
    public function delete_banner($id) {
        parent::model('delete');
        
        $this->db->table($this->db_table);
        $this->db->where('id = "'.$id.'"');
        
        return $this->db->build();
    }
}

?>