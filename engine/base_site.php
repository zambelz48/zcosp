<?php if(!defined('Z_KEY')) exit('Access denied !');

/**
 * Z-COSP (ZAMBELZ - CMS Open Source Project)
 * @package module/home
 * @license Open Source
 * @author Nanda . J . A
 * @copyright 2013
 */

class Base_site extends Z_Controller {
    
    /**
     * Konstruktor
     * @access public
     **/     
    public function __construct() {
        parent::init('site');
        $this->load->model('modules');
    }
    
    /**
     * Content site
     * semua content/isi website diatur disini
     * @access public
     **/ 
    public function view() {
        if(isset($_GET['page'])) {                      
            foreach($this->modules->get_all_module() as $page) {
                if($_GET['page'] == $page['module_name']) {
                    $mod = $page['module_name'];
                    
                    //header
                    //load semua konfigurasi meta_data disini ...
                    load_class(MODULE_PATH.$mod.DS, 'site', $mod.'_site', 'header_config');                        
                    load_class(MODULE_PATH.'site_profile'.DS, 'site', 'site_profile_site', 'view_header');
                        
                    //content                    
                    load_class(MODULE_PATH.$mod.DS, 'site', $mod.'_site');
                }            
            }            
        } else {
            redirect('home.html');
        }
        
        //footer
        load_class(MODULE_PATH.'site_profile'.DS, 'site', 'site_profile_site', 'view_footer');          
    }    
}

?>