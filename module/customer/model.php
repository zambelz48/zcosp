<?php if(!defined('Z_KEY')) exit('Access denied !');

/**
 * Z-COSP (ZAMBELZ - CMS Open Source Project)
 * @package customer model
 * @license Open Source
 * @author Nanda . J . A
 * @copyright 2013
 */

class Customer_model extends Z_Model {
    
    private $date;
    
    public function __construct() {
        $this->date = date("Y-m-d") .' '. date("H:i:s", time());    
    }
    
    public function get_all_customer($mode = '') {
        parent::model('select');
        
        $this->db->select();
        $this->db->table('customer');
        
        $query = $this->db->build();
        
        if($mode == 'total_data') {
            return $this->db->num_rows($query);
        } else if($mode == 'all_records') {
            while($customer = $this->db->fetch_array($query)) {
                $data[] = array('id'            => $customer['id'],
                                'username'      => $customer['username'],
                                'password'      => $customer['password'],
                                'blocked'       => $customer['blocked'],
                                'newsletter'    => $customer['newsletter'],
                                'reg_date'      => $customer['reg_date'],
                                'last_login'    => $customer['last_login']);
            }
            
            return $data;
        }
    }
    
    public function get_customer($view = '', $id) {
        parent::model('select');
        
        $this->db->select();
        
        if($view == 'detail') {
            $db_table = 'customer_detail';
            $condition = 'id_customer = "'.$id.'"';
        } else {
            $db_table = 'customer';
            $condition = 'id = "'.$id.'"';
        }
        
        $this->db->table($db_table);
        $this->db->where($condition);
        
        $query = $this->db->build();
        
        return $this->db->fetch_array($query);
    }
    
    public function save_customer() {
        parent::model('insert');
        
        
        
        $values = array('username'          => anti_inject($_POST['username']), 
                        'password'          => anti_inject(md5($_POST['password'])),
                        'blocked'           => 'N',
                        'newsletter'        => $_POST['newsletter'],
                        'reg_date'          => $this->date,
                        'last_login'        => '0000-00-00 00:00:00');
        
        $this->db->table('customer');
        $this->db->insert($values);
        
        return $this->db->build();    
    }
    
    public function update_customer($id) {
        parent::model('update');
        
        $values = array('username'          => anti_inject($_POST['username']), 
                        'password'          => anti_inject(md5($_POST['password'])),
                        'blocked'           => $_POST['blocked'],
                        'newsletter'        => $_POST['newsletter'],
                        'reg_date'          => $this->date);
        
        $this->db->table('customer');
        $this->db->update($values);
        $this->db->where('id = "'.$id.'"');
        
        return $this->db->build();
    }
    
    public function get_last_id_customer() {
        parent::model('select');
        
        $this->db->select('id');
        $this->db->table('customer');
        $this->db->order('id');
        $this->db->sort('DESC');
        $this->db->limit('1');
        
        $query = $this->db->build();
        $id = $this->db->fetch_array($query);
        
        return $id['id'];
    }
    
    public function save_customer_detail($id_customer, $photo = '') {
        parent::model('insert');
        
        $values = array('id_customer'   => $id_customer,
                        'fullname'      => anti_inject($_POST['fullname']),
                        'sex'           => anti_inject($_POST['sex']),
                        'photo'         => $photo,
                        'address'       => anti_inject($_POST['address']),
                        'state'         => anti_inject($_POST['state']),
                        'city'          => anti_inject($_POST['city']),
                        'postal_code'   => anti_inject($_POST['postal_code']),
                        'phone_number'  => anti_inject($_POST['phone_number']),
                        'email'         => anti_inject($_POST['email']));
        
        $this->db->table('customer_detail');
        $this->db->insert($values);
        
        return $this->db->build();    
    }
    
    public function update_customer_detail($id_customer, $photo = '') {
        parent::model('update');
        
        $values = array('fullname'      => anti_inject($_POST['fullname']),
                        'sex'           => anti_inject($_POST['sex']),
                        'photo'         => $photo,
                        'address'       => anti_inject($_POST['address']),
                        'state'         => anti_inject($_POST['state']),
                        'city'          => anti_inject($_POST['city']),
                        'postal_code'   => anti_inject($_POST['postal_code']),
                        'phone_number'  => anti_inject($_POST['phone_number']),
                        'email'         => anti_inject($_POST['email']));
        
        $this->db->table('customer_detail');
        $this->db->update($values);
        $this->db->where('id_customer = "'.$id_customer.'"');
        
        return $this->db->build();    
    }
    
    public function update_blocked_status_customer($id) {
        parent::model('update');
        
        $this->db->table('customer');
        $this->db->update(array('blocked' => $_POST['blocked']));
        $this->db->where('id = "'.$id.'"');
        
        return $this->db->build();        
    }
    
    public function add_to_wishlist() {
        parent::model('insert');
        
        $values = array('id_customer'   => $_SESSION['id'], 
                        'id_product'    => $_GET['id_product'], 
                        'created'       => $this->date);
        
        $this->db->table('customer_wishlist');
        $this->db->insert($values);
        
        return $this->db->build();
    }
    
    public function view_wishlist($mode = '') {
        parent::model('custom');
        
        $this->db->custom(' SELECT * FROM customer_wishlist, product 
                            WHERE id_customer = '.$_SESSION['id'].'
                            AND customer_wishlist.id_product = product.id');
        
        $query = $this->db->build();
        
        if($mode == 'total_data') {
            return $this->db->num_rows($query);
        } else if($mode == 'all_records') {
            while($wishlist = $this->db->fetch_array($query)) {
                $data[] = array('id'            => $wishlist['id'],
                                'id_customer'   => $wishlist['id_customer'],
                                'id_product'    => $wishlist['id_product'],
                                'product_name'  => $wishlist['name'],
                                'product_price' => $wishlist['price'],
                                'date_added'    => $wishlist['date_added']);
            }
            
            return $data;    
        }        
    }
    
    public function delete_wishlist() {
        parent::model('delete');
        
        $this->db->table('customer_wishlist');
        $this->db->where('id = "'.$id.'"');
        
        return $this->db->build();
    }
    
    public function delete_customer($id) {
        parent::model('delete');
        
        $this->db->table('customer');
        $this->db->where('id = "'.$id.'"');
        
        return $this->db->build();
    }
}

?>