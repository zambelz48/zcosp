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
            $this->view->assign('editor_path', '../engine/editor/tinymce/');
            $this->view->display('header.tpl');
            
            if(isset($_GET['page'])) {        
                if($_GET['page'] == '') {
                    load_class(MODULE_PATH.'home'.DS, 'admin', 'home_admin');
                } else if($_GET['page'] == 'modules') {
                    load_class(MODULE_PATH.'modules'.DS, 'admin', 'modules_admin');
                } else if($_GET['page'] == 'logout') {
                    session_destroy();
                    $_SESSION = array();
                    redirect('index.php');            
                } else {
                    //load semua module disini ...
                    foreach($this->modules->get_all_module() as $module) {
                        $mod = $module['module_name'];
                        if($_GET['page'] == $mod) {                        
                            load_class(MODULE_PATH.$mod.DS, 'admin', $mod.'_admin');
                        } 
                    }
                }
                          
                $this->view->display('footer.tpl');
            }            
        }
    }    
}

?>