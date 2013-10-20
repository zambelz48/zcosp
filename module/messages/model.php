<?php if(!defined('Z_KEY')) exit('Access denied !');

/**
 * Z-COSP (ZAMBELZ - CMS Open Source Project)
 * @package messages model
 * @license Open Source
 * @author Nanda . J . A
 * @copyright 2013
 */

class Messages_model extends Z_Model {
    
    private $db_table = 'messages';
    
    public function get_all_msg() {
        parent::model('select');
        
        $this->db->select();
        $this->db->table($this->db_table);
        
        $query = $this->db->build();
        
        while($menu = $this->db->fetch_array($query)){
            $data[] = array('id'        => $menu['id'],
                            'name'      => $menu['name'],
                            'parent'    => $menu['parent'],
                            'level'     => $menu['level'],
                            'type'      => $menu['type'], 
                            'link'      => $menu['link']);
        }
        
        return $data;
    }
    
    public function send_messages() {
        
    }
    
    
    
}

?>