<?php if(!defined('Z_KEY')) exit('Access denied !');

/**
 * Z-COSP (ZAMBELZ - CMS Open Source Project)
 * @package modules model
 * @license Open Source
 * @author Nanda . J . A
 * @copyright 2013
 */

class Modules_model extends Z_Model {
    
    private $db_table = 'modules';
    
    public function get_all_module() {
        parent::model('select');
        
        $this->db->select();
        $this->db->table($this->db_table);
        
        $query = $this->db->build();
        
        while($module = $this->db->fetch_array($query)) {
            $data[] = array('id'            => $module['id'], 
                            'module_name'   => $module['module_name'],
                            'total_size'    => $module['total_size'],
                            'created'       => $module['created']);
        }
        
        return $data;
    }
    
}

?>