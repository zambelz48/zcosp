<?php if(!defined('Z_KEY')) exit('Access denied !');

/**
 * Z-COSP (ZAMBELZ - CMS Open Source Project)
 * @package product_review model
 * @license Open Source
 * @author Nanda . J . A
 * @copyright 2013
 */

class Product_review_model extends Z_Model {
    
    public function get_all_review($mode = '') {
        parent::model('select');
        
        $this->db->select();
        $this->db->table('product_review');
        
        $query = $this->db->build();
        
        if($mode == 'total_data') {
            return $this->db->num_rows($query);
        } else if($mode == 'all_records') {
            while($review = $this->db->fetch_array($query)) {
                $data[] = array('id'            => $review['id'],
                                'id_product'    => $review['id_product'],
                                'reply_to'      => $review['reply_to'],
                                'user_type'     => $review['user_type'],
                                'id_user'       => $review['id_user'],
                                'username'      => $review['username'],
                                'subject'       => $review['subject'],
                                'content'       => $review['content'],
                                'created'       => $review['created'],
                                'updated'       => $review['updated']);
            }
            
            return $data;
        }
    }
    
    public function get_review($id) {
        parent::model('select');
        
        $this->db->select();
        $this->db->table('product_review');
        $this->db->where('id = "'.$id.'"');
        
        $query = $this->db->build();
        
        return $this->db->fetch_array($query);        
    }
    
    public function reply_review() {
        parent::model('insert');
        
        $date = date("Y-m-d") .' '. date("H:i:s", time());
        
        $values = array();
        
        $this->db->table($this->db_table);
        $this->db->insert($values);
        
        return $this->db->build();   
    }
    
    public function delete_review($mode = '', $id) {
        parent::model('delete');
        
        $this->db->table('product_review');
        
        if($mode == 'parent') {
            $this->db->where('id = "'.$id.'"');
        } else if($mode == 'child') {
            $this->db->where('reply_to = "'.$id.'"');
        } else if($mode == 'product') {
            $this->db->where('id_product = "'.$id.'"');
        }
        
        return $this->db->build();
    }
    
}



?>