<?php if(!defined('Z_KEY')) exit('Access denied !');

/**
 * Z-COSP (ZAMBELZ - CMS Open Source Project)
 * @package product_category model
 * @license Open Source
 * @author Nanda . J . A
 * @copyright 2013
 */

class Product_category_model extends Z_Model {
    
    private $db_table = 'product_category';
    
    public function get_all_pcategory($mode = '', $where = '') {         
        parent::model('select');
        
        $this->db->select();
        $this->db->table($this->db_table);
        
        if($where = 'by_parent') {
            $this->db->where('parent = 0');
        }
        
        $query = $this->db->build();
        
        if($mode == 'total_data') {
            return $this->db->num_rows($query);
        } else if($mode == 'all_records') {
            $no = 0;        
            while ($pc = $this->db->fetch_array($query)) {                        
                $data[] = array('no'        => $no,
                                'id'        => $pc['id'], 
                                'parent'    => $pc['parent'],
                                'name'      => $pc['name'], 
                                'image'     => $pc['image'],
                                'meta_desc' => $pc['meta_desc'],
                                'meta_key'  => $pc['meta_key'],
                                'publish'   => $pc['publish'],
                                'created'   => $pc['created'],
                                'updated'   => $pc['updated']);
                $no++;            
            }
            
            return $data;
        }    
    }
    
    public function get_multilevel($id = '') {
        parent::model('custom');
        
        $where = '';
                    
        if(strlen($id) > 0) {
            $where = 'WHERE parent="'.$id.'"';
        }
                                       
        $this->db->custom('SELECT * FROM product_category '.$where.' AND publish="Y" ORDER BY level ASC');
        $query = $this->db->build();
        
        $num = $this->db->num_rows($query);
        
        $i = 0;
        $data = '';
                
        while($pcat = $this->db->fetch_array($query)) {
            $pcat_name = strtolower(preg_replace('/\s/','_',$pcat['name']));
            $url = 'product-category-'.$pcat['id'].'-'.$pcat_name.'.html';
            
            if($i == 0) {
                if($pcat['parent'] == 0) {
                    $data = '<ul>';
                } else {                    
                    $data = '<div><ul>';   
                }                
            }         
                                        
            $i++;
            
            $data .= '<li><a href="'.$url.'">'.strtoupper($pcat['name']).'</a>';
                
            $data .= $this->get_multilevel($pcat['id']);
                                                    
            $data .= '</li>';
                                        
            if($i == $num) {
                if($pcat['parent'] == 0) {
                    $data .= '</ul>';
                } else {                    
                    $data .= '</ul></div>';   
                }                      
            }
        }
        
        return $data;
    }
    
    public function get_pcategory($id) {
        parent::model('select');
        
        $this->db->select();
        $this->db->table($this->db_table);
        $this->db->where('id = "'.$id.'"');
        
        $query = $this->db->build();
        
        return $this->db->fetch_array($query);
    }
    
    public function save_pcategory($image) {
        parent::model('insert');
        
        $values = array('parent'    => $_POST['parent'],
                        'name'      => $_POST['name'], 
                        'image'     => $image,
                        'meta_desc' => $_POST['meta_desc'],
                        'meta_key'  => $_POST['meta_key'],
                        'publish'   => $_POST['publish'],
                        'created'   => $_POST['created']);
        
        $this->db->table($this->db_table);
        $this->db->insert($values);
        
        return $this->db->build();
    }
    
    public function update_pcategory($id, $image) {
        parent::model('update');
        
        $values = array('parent'    => $_POST['parent'],
                        'name'      => $_POST['name'], 
                        'image'     => $image,
                        'meta_desc' => $_POST['meta_desc'],
                        'meta_key'  => $_POST['meta_key'],
                        'publish'   => $_POST['publish'],
                        'updated'   => $_POST['updated']);        
        
        $this->db->table($this->db_table);
        $this->db->update($values);
        $this->db->where('id = "'.$id.'"');
        
        return $this->db->build();
    }
    
    public function delete_pcategory($id) {
        parent::model('delete');
        
        $this->db->table($this->db_table);
        $this->db->where('id = "'.$id.'"');
        
        return $this->db->build();
    }
    
}

?>