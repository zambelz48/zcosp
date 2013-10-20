<?php if(!defined('Z_KEY')) exit('Access denied !');

/**
 * Z-COSP (ZAMBELZ - CMS Open Source Project)
 * @package module/comments admin
 * @license Open Source
 * @author Nanda . J . A
 * @copyright 2013
 */

class Comments_admin extends Z_Controller {
    
    public function __construct() {
        parent::init('admin');
    }
    
    public function comment_list() {
        $comments = array();
        
        $thead = array( '<th>Komentar dari</th>', 
                        '<th>Tgl komentar</th>');
        
        parent::table_config(   'comments', 'daftar komentar',
                                '', '',
                                'hapus',
                                '',
                                $thead, $comments);
    }
    
    public function delete_comments() {
        
    }
    
    public function view() {
        switch($_GET['act']) {
            case 'read' :
            break;
            
            default :
                $this->comment_list();                
            break;
        }        
    }
    
}

?>