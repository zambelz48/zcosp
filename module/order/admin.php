<?php if(!defined('Z_KEY')) exit('Access denied !');

/**
 * Z-COSP (ZAMBELZ - CMS Open Source Project)
 * @package module/sales admin
 * @license Open Source
 * @author Nanda . J . A
 * @copyright 2013
 */

class Order_admin extends Z_Controller {
    
    public function __construct() {
        parent::init('admin');
        $this->load->model('order');
    }
    
    private function order_list() {
        $order = $this->order->get_all_order();
        
        $thead = array( '<th>Kode transaksi</th>',
                        '<th>Tgl pembelian</th>', 
                        '<th>Status</th>');
                        
        parent::table_config(   'order', 'daftar penjualan', 
                                '', 'Hapus',
                                $thead, $order);        
    }
    
    public function view() {
        switch($_GET['act']) {            
            case 'edit' :
            break;
            
            case 'delete' :
            break;
            
            default:
                $this->order_list();                
            break;
        }
    }
}

?>