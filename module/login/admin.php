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
                $username = esc_string($_POST['username']);
                $password = esc_string(md5($_POST['password']));
                $login = $this->login->user_login('admin', $username, $password);

                switch($login) {
                    case 0 :
                        parent::alert('error', 'Error', 'User tidak ditemukan !');
                        break;
                    case 1 :
                        redirect('index.php?page=home');
                        break;
                    case 2 :
                        parent::alert('error', 'Error', 'Terjadi kesalahan ! <br />'. mysql_errno());
                        break;
                    default :
                        break;
                }
            }        
        }
        
        $this->view->display('login.tpl');                        
    }
    
}