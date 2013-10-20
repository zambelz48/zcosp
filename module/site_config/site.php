<?php if(!defined('Z_KEY')) exit('Access denied !');

/**
 * Z-COSP (ZAMBELZ - CMS Open Source Project)
 * @package module/site_config site
 * @license Open Source
 * @author Nanda . J . A
 * @copyright 2013
 */

class Site_config_site extends Z_Controller {
    
    public function __construct() {
        parent::init('site');
        $this->load->model('site_config');
        $this->load->model('product_category', 'pcategory'); 
    }
    
    private function breadcrumb_link() {
        $this->view->assign('breadcrumb', 'breadcrumb links appear here..');
    }
    
    public function view_header() {
        $this->view->assign('up_menu', $this->pcategory->get_multilevel('0'));
        
        $this->breadcrumb_link();
        
        if($_GET['page'] == '' || $_GET['page'] == 'home') {
            $customer_side_menu = 0;
        } else {
            $customer_side_menu = 1;
        }
        
        $this->view->assign('customer_side_menu', $customer_side_menu);
        
        $this->view->display('header.tpl');
    }
    
    public function view_footer() {
        $site = $this->site_config->base_config();
        
        $this->view->assign('site_footer', $site['site_footer']);
        $this->view->display('footer.tpl');
    }
    
    public function view() {
        
    }
    
}

?>