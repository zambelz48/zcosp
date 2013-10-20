<?php if(!defined('Z_KEY')) exit('Access denied !');

/**
 * Z-COSP (ZAMBELZ - CMS Open Source Project)
 * @package module/site_profile site
 * @license Open Source
 * @author Nanda . J . A
 * @copyright 2013
 */


class Site_profile_site extends Z_Controller {
    
    public function __construct() {
        parent::init('site');        
        $this->load->model('home_slider', 'hs');
        $this->load->model('site_profile', 'profile');
        $this->load->model('product_category', 'pcategory');
        $this->load->model('modules');
        $this->load->model('order'); 
    }
    
    private function mini_cart() {        
        $cart = $this->order->view_cart();
        $total_qty = $this->order->view_cart('totaldata');
        $total_buy = $this->order->view_cart('totalbuy');
                
        $this->view->assign('view_mini_cart', $cart);
        $this->view->assign('empty_cart_msg', 'Keranjang belanja anda masih kosong');
        $this->view->assign('total_qty', $total_qty.' item');
        $this->view->assign('total_buy', $total_buy);
    }
    
    private function breadcrumb_link() {        
        if($_GET['page'] == '' || $_GET['page'] == 'home') {
            $this->view->assign('breadcrumb', 'home.html');
        } else {
            foreach($this->modules->get_all_module() as $page) {
                if($_GET['page'] == $page['module_name']) {
                    $this->view->assign('breadcrumb', 'home&nbsp;&raquo;&nbsp;'.$page['module_name']);
                }            
            }
        }
    }
    
    private function home_slider() {
        $home_slider = $this->hs->get_all_home_slider('activated', 'all_records');
        $total_active_slider = $this->hs->get_all_home_slider('activated', 'total_data');
        
        $this->view->assign('slider_directory', './files/images/slider/');
        $this->view->assign('total_active_slider', $total_active_slider);                 
        $this->view->assign('home_slider', $home_slider);    
    }
    
    public function view_header() {
        $this->view->assign('up_menu', $this->pcategory->get_multilevel('0'));
        
        $this->mini_cart();
        
        $this->breadcrumb_link();
        
        if($_GET['page'] == '' || $_GET['page'] == 'home' || $_GET['page'] == 'index.php') {
            $this->home_slider();    
        }        
        
        if(empty($_SESSION['user_type']) || $_SESSION['user_type'] != 'customer'){
            $guest_welcome_text = 'Selamat datang pengunjung anda bisa <a href="customer-login.html">login</a> 
            atau <a href="customer-register.html">membuat akun baru</a>.';                    
        } else {
            $guest_welcome_text = 'Selamat datang '.$_SESSION['username'].' , <a href="customer-logout.html">logout</a>';
        }
        
        $this->view->assign('guest_welcome_text', $guest_welcome_text);
        
        $this->view->display('header.tpl');
    }
    
    public function view_footer() {
        $site = $this->profile->base_profile();
        
        $this->view->assign('site_footer', $site['site_footer']);
        $this->view->display('footer.tpl');
    }
    
    public function view() {}
}

?>