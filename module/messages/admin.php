<?php if(!defined('Z_KEY')) exit('Access denied !');

/**
 * Z-COSP (ZAMBELZ - CMS Open Source Project)
 * @package module/messages admin
 * @license Open Source
 * @author Nanda . J . A
 * @copyright 2013
 */

class Messages_admin extends Z_Controller {
    
    public function __construct() {
        parent::init('admin', 'messages');
    }
    
    private function messages_list() {
        $messages = array();
        $total_messages = 0;
        
        $this->delete_messages();
        
        $thead = array( '<th>Judul</th>', 
                        '<th>Tanggal</th>');
                        
        parent::table_config(   'messages', 'daftar pesan', 
                                'Buat pesan baru', 'Hapus',
                                $thead, $messages, $total_messages);
    }
    
    private function delete_messages() {
        
    }
    
    private function new_messages() {
        
    }
    
    private function view_messages() {
        
    }
    
    public function view() {
        switch($_GET['act']) {
            case 'add' :
                $this->new_messages();
            break;
            
            case 'edit' :
                $this->view_messages();
            break;
            
            default :
                $this->messages_list();
            break;
        }
    }
}

?>