<?php if(!defined('Z_KEY')) exit('Access denied !');

/**
 * Z-COSP (ZAMBELZ - CMS Open Source Project)
 * @package module/page
 * @license Open Source
 * @author Nanda . J . A
 * @copyright 2013
 */

class Page_site extends Z_Controller {
    
    public function __construct() {
        parent::init('site', 'page');
    }
    
    private function about_us() {
        parent::fetch('page/about-us', 'module');
    }
    
    private function contact_us() {
        if(empty($_SESSION['user_type']) || $_SESSION['user_type'] != 'customer'){
            $disabled_field = '';
            $username_field = '';
            $email_field = '';
        } else {
            $disabled_field = 'disabled';
            $username_field = $_SESSION['username'];
            $email_field = '';
        }
        
        if($_POST) {
            
        }
        
        $this->view->assign('disabled_field', $disabled_field);
        $this->view->assign('username_field', $username_field);
        $this->view->assign('email_field', $email_field);
        $this->view->assign('captcha_src', SITE_CAPTCHA_SRC);
                
        parent::fetch('page/contact-us', 'module');
    }
    
    private function privacy_policy() {
        parent::fetch('page/privacy-policy', 'module');
    }
    
    public function header_config() {        
        switch($_GET['view']) {
            case 'about-us' :
                $title = 'Tentang Kami';
                $meta_key = '';
                $meta_desc = '';
            break;
            
            case 'contact-us' :
                $title = 'Hubungi Kami';
                $meta_key = '';
                $meta_desc = '';
            break;
            
            case 'privacy-policy' :
                $title = 'Syarat & Ketentuan';
                $meta_key = '';
                $meta_desc = '';
            break;
            
            default :
            break;
        }
        
        parent::site_head_config($title, $meta_key, $meta_desc);
    }
    
    public function view() {
        switch($_GET['view']) {
            case 'about-us' :
                $this->about_us();
            break;
            
            case 'contact-us' :
                $this->contact_us();
            break;
            
            case 'privacy-policy' :
                $this->privacy_policy();
            break;
            
            default :
            break;
        }
    }
    
}

?>