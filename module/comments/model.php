<?php if(!defined('Z_KEY')) exit('Access denied !');

/**
 * Z-COSP (ZAMBELZ - CMS Open Source Project)
 * @package comments model
 * @license Open Source
 * @author Nanda . J . A
 * @copyright 2013
 */

class Comments_model extends Z_Model {
    
    private $db_table = 'comments';
    
    public function get_all_comments() {
        
    }
    
    public function delete_comments($id) {
        parent::model('delete');
        
        $this->db->table($this->db_table);
        $this->db->where('id = "'.$id.'"');
        
        return $this->db->build();
    }
    
}

?>