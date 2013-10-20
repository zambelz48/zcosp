<?php if(!defined('Z_KEY')) exit('Access denied !');

/**
 * Z-COSP (ZAMBELZ - CMS Open Source Project)
 * @package module/themes admin
 * @license Open Source
 * @author Nanda . J . A
 * @copyright 2013
 */

class Themes_admin extends Z_Controller {
    
    public function __construct() {
        parent::init('admin', 'themes');        
        $this->load->model('themes');
    }
    
    public function theme_list() {
        $themes = $this->themes->get_all_theme();
        
        $thead = array( '<th style="width:20px">ID</th>', 
                        '<th>Nama tema</th>', 
                        '<th>Status</th>');
        
        parent::table_config(   'themes', 'daftar tema',
                                'tambah', 'hapus',
                                $thead, $themes);
    }
    
    public function set_active() {
        
    }
    
    public function view() {
        switch($_GET['act']) {
            case 'add':
            break;
            
            default :
                $this->theme_list();                
            break;
        }        
    }
}


?>