<?php if(!defined('Z_KEY')) exit('Access denied !');

/**
 * Z-COSP (ZAMBELZ - CMS Open Source Project)
 * @package module/order site
 * @license Open Source
 * @author Nanda . J . A
 * @copyright 2013
 */

class Order_site extends Z_Controller {
    
    public function __construct() {
        parent::init('site', 'order');
        $this->load->model('order');
    }
    
    public function cart() {
        if($_POST) {
            $update = $this->order->update_cart($_POST['id_product'], $_POST['qty']);
            
            if($update) {
                redirect('customer-cart.html');    
            }            
        }
        
        $cart = $this->order->view_cart();
        $total_buy = $this->order->view_cart('totalbuy');
                
        $this->view->assign('view_cart', $cart);
        $this->view->assign('total_buy', $total_buy);
        
        parent::fetch('customer/cart', 'module');
    }
    
    public function add_cart() {
        $id_product = $_GET['id_product'];
        $check = $this->order->get_product('check_data', $id_product);
        $qty = $this->order->get_product('get_qty', $id_product);
        
        if($check == 0) {
            $add = $this->order->add_to_cart($id_product);
        } else {
            $add = $this->order->update_cart($id_product, $qty['qty']+1);            
        }
        
        if($add) {
            redirect('customer-cart.html');         
        } else {
            $this->view->assign('cart_error', mysql_error());            
        }         
    }
    
    public function remove_cart() {
        $id_product = $_GET['id_product'];
        $this->order->remove_cart($_GET['id_product']);
        redirect('customer-cart.html');
    }
    
    public function header_config() {
        parent::site_head_config('Keranjang belanja', '', '');
    }
    
    public function view() {
        if(isset($_GET['act'])) {
            switch($_GET['act']) {
                case 'add_cart' :
                    $this->add_cart();
                break;
                
                case 'remove_cart' :
                    $this->remove_cart();
                break;
                
                case 'checkout' :
                break;
            }
        } else {
            $this->cart();
        }
    }
}

?>