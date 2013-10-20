<?php if(!defined('Z_KEY')) exit('Access denied !');

/**
 * Z-COSP (ZAMBELZ - CMS Open Source Project)
 * @package product_brand model
 * @license Open Source
 * @author Nanda . J . A
 * @copyright 2013
 */

class Product_brand_model extends Z_Model {
    
    private $db_table = 'product_brand';
    
    public function get_all_brand($mode = '') {
        parent::model('select');
        
        $this->db->select();
        $this->db->table($this->db_table); 
        $query = $this->db->build();       
        
        if($mode == 'total_data') {
            return $this->db->num_rows($query);
        } else if($mode == 'all_records') {
            $no = 0;
            while($brand = $this->db->fetch_array($query)) {
                $data[] = array('no'            => $no,
                                'id'            => $brand['id'],
                                'name'          => $brand['name'],
                                'image'         => $brand['image'],
                                'web'           => $brand['web'],
                                'description'   => $brand['description'],
                                'meta_desc'     => $brand['meta_desc'],
                                'meta_key'      => $brand['meta_key'],
                                'publish'       => $brand['publish'],
                                'created'       => $brand['created'],
                                'updated'       => $brand['updated']);
                $no++;
            }
            
            return $data;
        }
    }
    
    public function get_brand($id) {
        parent::model('select');
        
        $this->db->select();
        $this->db->table($this->db_table);
        $this->db->where('id = "'.$id.'"');
        
        $query = $this->db->build();
        
        return $this->db->fetch_array($query);
    }
    
    public function save_brand($image) {
        parent::model('insert');
        
        $values = array('name'          => $_POST['name'], 
                        'image'         => $image,
                        'web'           => $_POST['web'],
                        'description'   => $_POST['description'],
                        'meta_desc'     => $_POST['meta_desc'],
                        'meta_key'      => $_POST['meta_key'],
                        'publish'       => $_POST['publish'],
                        'created'       => $_POST['created']);        
        
        $this->db->table($this->db_table);
        $this->db->insert($values);
        
        return $this->db->build();
    }
    
    public function update_brand($id, $image) {
        parent::model('update');
        
        $values = array('name'          => $_POST['name'], 
                        'image'         => $image,
                        'web'           => $_POST['web'],
                        'description'   => $_POST['description'],
                        'meta_desc'     => $_POST['meta_desc'],
                        'meta_key'      => $_POST['meta_key'],
                        'publish'       => $_POST['publish'],
                        'updated'       => $_POST['updated']);        
        
        $this->db->table($this->db_table);
        $this->db->update($values);
        $this->db->where('id = "'.$id.'"');
        
        return $this->db->build();
    }
    
    public function delete_brand($id) {
        parent::model('delete');
        
        $this->db->table($this->db_table);
        $this->db->where('id = "'.$id.'"');
        
        return $this->db->build();
    }
    
}

?>