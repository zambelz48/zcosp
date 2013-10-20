<?php if(!defined('Z_KEY')) exit('Access denied !');

/**
 * Z-COSP (ZAMBELZ - CMS Open Source Project)
 * @package product model
 * @license Open Source
 * @author Nanda . J . A
 * @copyright 2013
 */

class Product_model extends Z_Model {
    
    private $db_table = 'product';
    
    public function get_all_product($view = '', $attr = '', $mode = '', $id_pcategory = '') {
        parent::model('select');
        
        $this->db->select();
        $this->db->table($this->db_table);
        
        if($attr == 'published') {
            $this->db->where('publish = "Y"');
        } else if($attr == 'unpublished') {
            $this->db->where('publish = "N"');
        }
        
        if($view == 'featured') {
            $this->db->where_and('featured = "Y"');
        } else if($view == 'latest') {
            $this->db->order('created');
            $this->db->sort('DESC');
            $this->db->limit('5');
        } else if($view == 'related') {
            $this->db->where_and('id_product_category = "'.$id_pcategory.'"');
            $this->db->limit('5');
        }
        
        $query = $this->db->build();
        
        if($mode == 'total_data') {
            return $this->db->num_rows($query);
        } else if($mode == 'all_records') {
            $no = 0;        
            while($product = $this->db->fetch_array($query)) {                
                $data[] = array('no'                    => $no,
                                'id'                    => $product['id'],
                                'id_user'               => $product['id_user'],
                                'id_product_category'   => $product['id_product_category'],
                                'id_product_brand'      => $product['id_product_brand'],
                                'name'                  => $product['name'],
                                'image'                 => $product['image'],
                                'price'                 => format_rupiah($product['price']),
                                'stock'                 => $product['stock'],
                                'status'                => $product['status'],
                                'description'           => $product['description'],
                                'featured'              => $product['featured'],
                                'meta_desc'             => $product['meta_desc'],
                                'meta_key'              => $product['meta_key'],
                                'publish'               => $product['publish'],
                                'created'               => $product['created'],
                                'updated'               => $product['updated']);
                $no++;
            }
            
            return $data;    
        }        
    }
    
    public function get_product($id) {
        parent::model('select');
        
        $this->db->select();
        $this->db->table($this->db_table);
        $this->db->where('id = "'.$id.'"');
        
        $query = $this->db->build();
        
        return $this->db->fetch_array($query);
    }
    
    public function save_product($image) {
        parent::model('insert');                
        
        if($_POST['stock'] > 0) {
            $status = '1';
        } else {
            $status = '0';
        }
        
        $date = date("Y-m-d") .' '. date("H:i:s", time());
        
        $values = array('id_user'               => $_SESSION['id'],
                        'id_product_category'   => $_POST['id_product_category'], 
                        'id_product_brand'      => $_POST['id_product_brand'],
                        'name'                  => $_POST['name'],
                        'image'                 => $image,
                        'price'                 => $_POST['price'],
                        'stock'                 => $_POST['stock'],
                        'status'                => $status,
                        'description'           => $_POST['description'],
                        'featured'              => $_POST['featured'],
                        'meta_desc'             => $_POST['meta_desc'],
                        'meta_key'              => $_POST['meta_key'],
                        'publish'               => $_POST['publish'],
                        'created'               => $date,
                        'updated'               => '0000-00-00 00:00:00');
        
        $this->db->table($this->db_table);
        $this->db->insert($values);
        
        return $this->db->build();
    }
    
    public function update_product($id, $image) {
        parent::model('update');
        
        if($_POST['stock'] > 0) {
            $status = '1';
        } else {
            $status = '0';
        }
        
        $date = date("Y-m-d") .' '. date("H:i:s", time());
                
        $values = array('id_product_category'   => $_POST['id_product_category'], 
                        'id_product_brand'      => $_POST['id_product_brand'],
                        'name'                  => $_POST['name'],
                        'image'                 => $image,
                        'price'                 => $_POST['price'],
                        'stock'                 => $_POST['stock'],
                        'status'                => $status,
                        'description'           => $_POST['description'],
                        'featured'              => $_POST['featured'],
                        'meta_desc'             => $_POST['meta_desc'],
                        'meta_key'              => $_POST['meta_key'],
                        'publish'               => $_POST['publish'],
                        'updated'               => $_POST['updated']);
        
        $this->db->table($this->db_table);
        $this->db->update($values);
        $this->db->where('id = "'.$id.'"');
        
        return $this->db->build();
    }
    
    public function delete_product($id) {
        parent::model('delete');
        
        $this->db->table($this->db_table);
        $this->db->where('id = "'.$id.'"');
        
        return $this->db->build();
    }    
}

?>