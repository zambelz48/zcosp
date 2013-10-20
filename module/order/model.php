<?php if(!defined('Z_KEY')) exit('Access denied !');

/**
 * Z-COSP (ZAMBELZ - CMS Open Source Project)
 * @package order model
 * @license Open Source
 * @author Nanda . J . A
 * @copyright 2013
 */

class Order_model extends Z_Model {
    
    private $db_table = 'order';
    
    public function get_all_order() {
        parent::model('select');
    }
    
    public function view_cart($mode = '') {
        parent::model('custom');
        
        $this->db->custom(' SELECT * FROM order_temp, product 
                            WHERE session_id = "'.session_id().'" 
                            AND order_temp.id_product=product.id');
                            
        $query = $this->db->build();
        
        $total = 0;
        
        $data = '';
        
        while($cart = $this->db->fetch_array($query)) {
            $subtotal = $cart['price'] * $cart['qty'];
            $total = $total + $subtotal;
            
            $data[] = array('id'            => $cart['id'],
                            'session_id'    => $cart['session_id'],
                            'id_product'    => $cart['id_product'],
                            'product_name'  => $cart['name'],
                            'product_price' => format_rupiah($cart['price']),
                            'qty'           => $cart['qty'],
                            'subtotal'      => format_rupiah($subtotal));
        }
        
        if($mode == 'totalbuy') {
            return format_rupiah($total);
        } else if($mode == 'totaldata') {
            return $this->db->num_rows($query);
        } else {
            return $data;    
        }        
    }
    
    public function get_product($mode = '', $id_product = '') {
        parent::model('select');
        
        $this->db->select();
        $this->db->table('order_temp');
        $this->db->where('session_id = "'.session_id().'"');
        $this->db->where_and('id_product = '.$id_product);
        $query = $this->db->build();
        
        if($mode == 'get_qty') {
            return $this->db->fetch_array($query);
        } else if($mode == 'check_data') {
            return $this->db->num_rows($query);    
        }        
    }
    
    public function add_to_cart($id_product) {
        parent::model('insert');
        
        $values = array('session_id'    => session_id(),
                        'id_product'    => $id_product,
                        'qty'           => '1');
                        
        $this->db->table('order_temp');
        $this->db->insert($values);
            
        return $this->db->build();
    }
    
    public function update_cart($id_product = '', $qty = '') {
        parent::model('update');
        
        $this->db->table('order_temp');
        $this->db->update(array('qty' => $qty));
        $this->db->where('session_id = "'.session_id().'"');
        $this->db->where_and('id_product = '.$id_product);        
        
        return $this->db->build();
    }
    
    public function remove_cart($id_product = '') {
        parent::model('delete');
        
        $this->db->table('order_temp');
        $this->db->where('session_id = "'.session_id().'"');
        $this->db->where_and('id_product = '.$id_product);
        
        return $this->db->build();
    }
    
    public function clear_cart() {
        parent::model('delete');
    }
}

?>