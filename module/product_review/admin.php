<?php if(!defined('Z_KEY')) exit('Access denied !');

/**
 * Z-COSP (ZAMBELZ - CMS Open Source Project)
 * @package module/product admin
 * @license Open Source
 * @author Nanda . J . A
 * @copyright 2013
 */

class Product_review_admin extends Z_Controller {
    
    public function __construct() {
        parent::init('admin', 'product_review');
        $this->load->model('product_review', 'review');
    }
    
    public function review_list() {
        $review = $this->review->get_all_review('all_records');
        $total_review = $this->review->get_all_review('total_data');
        
        $this->delete_review();
        
        $thead = array( '<th>Komentar dari</th>', 
                        '<th>Tgl komentar</th>');
        
        parent::table_config(   'comments', 'daftar komentar',
                                '', 'hapus',
                                $thead, $review, $total_review);
    }
    
    public function delete_review() {
        $check = $_POST['check'];
        $total_checked = count($check);
        
        if($total_checked > 0) {
            for($i=0; $i<$total_checked; $i++) {
                $this->review->delete_review('parent', $check[$i]);
                $this->review->delete_review('child', $check[$i]);                
            }
            
            redirect($this->base_link);    
        }
    }
    
    public function view_review() {
        
    }
    
    public function view() {
        switch($_GET['act']) {            
            case 'edit' :
                $this->view_review();
            break;
            
            default :
                $this->review_list();
            break;
        }
    }    
}

?>