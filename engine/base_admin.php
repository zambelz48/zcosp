<?php if(!defined('Z_KEY')) exit('Access denied !');

/**
 * Z-COSP (ZAMBELZ - CMS Open Source Project)
 * @package module/home
 * @license Open Source
 * @author Nanda . J . A
 * @copyright 2013
 */

class Base_admin extends Z_Controller {
    
    /**
     * Konstruktor
     * @access public
     **/     
    public function __construct() { 
        parent::init('admin');      
        $this->load->model('modules');
    }
    
    public function view() {
        if(empty($_SESSION['user_type']) || $_SESSION['user_type'] != 'admin'){
            load_class(MODULE_PATH.'login'.DS, 'admin', 'login_admin');                    
        } else if(!isset($_SESSION['id']) && !isset($_SESSION['username'])){
            load_class(MODULE_PATH.'login'.DS, 'admin', 'login_admin');                
        } else {
            $this->view->display('header.tpl');
            
            if(isset($_GET['page'])) {        
                if($_GET['page'] == 'modules') {
                    load_class(MODULE_PATH.'modules'.DS, 'admin', 'modules_admin');
                } else if($_GET['page'] == 'logout') {
                    session_destroy();
                    $_SESSION = array();
                    redirect('index.php');            
                } else {
                    //load semua module disini ...
                    foreach($this->modules->get_rows() as $module) {
                        $mod_link = '';
                        $mod_name = $module['module_name'];
                        
                        if(empty($module['menu_admin_alias'])) {
                            $mod_link = $module['module_name'];
                        } else {
                            $mod_link = $module['menu_admin_alias'];
                        }
                        
                        if($_GET['page'] == $mod_link) {                        
                            load_class(MODULE_PATH.$mod_name.DS, 'admin', $mod_name.'_admin');
                        } 
                    }
                }
            } else {
                redirect('index.php?page=home');
            }
            
            $this->view->display('footer.tpl');            
        }
    }    
}