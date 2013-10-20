<?php if(!defined('Z_KEY')) exit('Access denied !');

/**
 * Z-COSP (ZAMBELZ - CMS Open Source Project)
 * @package module/product_category site
 * @license Open Source
 * @author Nanda . J . A
 * @copyright 2013
 */

class Product_category_site extends Z_Controller {
    
    private $img_dir;
    
    public function __construct() {
        parent::init('site');
        $this->img_dir = './files/images/product/';
        $this->load->model('product');
        $this->load->model('product_category', 'pcategory');
    }
    
    public function header_config() {
        $pcategory = $this->pcategory->get_pcategory($_GET['id']);
        parent::site_head_config(   $pcategory['name'], 
                                    $pcategory['meta_key'], 
                                    $pcategory['meta_desc']);
    }
    
    public function view() {
        $pcategory = $this->pcategory->get_pcategory($_GET['id']);
        $total_product = $this->product->get_all_product('related', 'published', 'total_data', $pcategory['id']);
        $product = $this->product->get_all_product('related', 'published', 'all_records', $pcategory['id']);
        
        $this->view->assign('product_img_src', $this->img_dir);
        $this->view->assign('product_header', $pcategory['name']);
        $this->view->assign('total_product', $total_product);
        $this->view->assign('product_list', $product);
        
        parent::fetch('product/product_list', 'module');   
    }
}

?>