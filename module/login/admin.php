<?php if(!defined('Z_KEY')) exit('Access denied !');

/**
 * Z-COSP (ZAMBELZ - CMS Open Source Project)
 * @package module/login admin
 * @license Open Source
 * @author Nanda . J . A
 * @copyright 2013
 */

class Login_admin extends Z_Controller {
    
    public function __construct() {
        parent::init('admin');        
        $this->load->model('login');
    }
    
    public function view() {            
        if($_POST) {            
            if(empty($_POST['username'])) {
                parent::alert('error', 'Error', 'Kolom username kosong !');
            }else if(empty($_POST['password'])){
                parent::alert('error', 'Error', 'Kolom password kosong !');   
            }else {
                $username = anti_inject($_POST['username']);
                $password = anti_inject(md5($_POST['password']));
                $page = 'index.php?page=home';
                $msg_not_found = 'User tidak terdaftar !';
                
                $this->view->assign('user_not_found', $msg_not_found);
                $this->login->user_login('admin', $username, $password, $page, $msg_not_found);    
            }        
        }
        
        $this->view->display('login.tpl');                        
    }
    
}

?>