<?php if(!defined('Z_KEY')) exit('Access denied !');

/**
 * Z-COSP (ZAMBELZ - CMS Open Source Project)
 * @package module/home
 * @license Open Source
 * @author Nanda . J . A
 * @copyright 2013
 */

class Home_site extends Z_Controller {
    
    private $img_dir;
    
    /**
     * Konstruktor
     * @access public
     **/     
    public function __construct() {
        parent::init('site');
        
        $this->img_dir = './files/images/product/';
        $this->load->model('product');
        $this->load->model('product_brand', 'brand');
        $this->load->model('product_category', 'category');
    }
    
    private function product_featured() {
        $featured_product = $this->product->get_all_product('featured', 'published', 'all_records');
        $total_active_featured = $this->product->get_all_product('featured', 'published', 'total_data');        
                
        $this->view->assign('total_active_featured', $total_active_featured);
        $this->view->assign('featured_product', $featured_product);
    }
    
    private function home_banner() {
        
    }
    
    private function product_latest() {
        $latest_product = $this->product->get_all_product('latest', 'published', 'all_records');
        $total_active_latest = $this->product->get_all_product('latest', 'published', 'total_data');        
                
        $this->view->assign('total_active_latest', $total_active_latest);
        $this->view->assign('latest_product', $latest_product);
    }
    
    public function header_config() {
        parent::site_head_config(   'home title', 
                                    'meta keyword for home', 
                                    'meta description for home');        
    }
    
    public function view() {
        $this->view->assign('img_dir', $this->img_dir);
        
        $this->product_featured();
        $this->home_banner();
        $this->product_latest();
        
        parent::fetch('home', 'module');
    }
    
}

?>