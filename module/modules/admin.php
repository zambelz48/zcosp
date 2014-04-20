<?php if(!defined('Z_KEY')) exit('Access denied !');

/**
 * Z-COSP (ZAMBELZ - CMS Open Source Project)
 * @package module/modules admin
 * @license Open Source
 * @author Nanda . J . A
 * @copyright 2013
 */

class Modules_admin extends Z_Controller {
    
    public function __construct() {
        parent::init('admin', 'modules');
        $this->load->model('modules', 'mod');
    }
    
    public function module_list() {
        $module = $this->mod->get_rows();
        $thead  = array('<th>Nama module</th>', '<th>Ukuran</th>', '<th>Tgl Install</th>');
        parent::table_config('modules', 'daftar modul', 'tambah', 'hapus', $thead, $module);
    }
    
    public function view() {
        switch($_GET['act']) {
            case 'add' :
            break;
            
            default :
                $this->module_list();                
            break;
        }        
    }
    
}