<?php if(!defined('Z_KEY')) exit('Access denied !');

/**
 * Z-COSP (ZAMBELZ - CMS Open Source Project)
 * @package module/login site
 * @license Open Source
 * @author Nanda . J . A
 * @copyright 2013
 */

class Login_site extends Z_Controller {
    
    public function __construct() {
        parent::init('site');        
        $this->load->model('login');
    }
    
    public function error_msg($msg) {
        return '<div class="warning">Error: '.$msg.'!</div>';
    }
    
    public function view() {            
        if($_POST) {            
            if(empty($_POST['username'])) {
                $this->view->assign('login_error_msg', $this->error_msg('kolom username kosong !'));
            }else if(empty($_POST['password'])){
                $this->view->assign('login_error_msg', $this->error_msg('kolom password kosong !'));  
            }else {
                $username = anti_inject($_POST['username']);
                $password = anti_inject(md5($_POST['password']));
                $page = 'customer.html';
                $msg_not_found = 'Customer tidak terdaftar !';
                
                $this->view->assign('login_user_not_found_msg', $this->error_msg($msg_not_found));
                
                $this->login->user_login('customer', $username, $password, $page, $msg_not_found);    
            }        
        }
        
        parent::fetch('login', 'module/customer');
    }    
}

?>