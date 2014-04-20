<?php if(!defined('Z_KEY')) exit('Access denied !');

/**
 * Z-COSP (ZAMBELZ - CMS Open Source Project)
 * @package themes model
 * @license Open Source
 * @author Nanda . J . A
 * @copyright 2013
 */

class Themes_model extends Z_Model {
    
    private $db_table = 'themes';
    
    public function get_rows() {
        $result = '';

        try {
            $query = $this->db->select($this->db_table);

            while($row = $this->db->fetch($query)) {
                $result[] = array(
                    'id'           => $row['id'],
                    'theme_name'   => $row['theme_name'],
                    'design'       => $row['design'],
                    'is_active'    => $row['is_active'],
                    'created'      => $row['created'],
                    'updated'      => $row['updated']
                );
            }
        } catch(Exception $e) {
            $result = $e->getMessage();
        }

        return $result;
    }

    public function get_count() {
        $query = $this->db->select($this->db_table);
        return $this->db->getCount($query);
    }

    public function set_active_theme($id) {

    }
    
    public function set_inactive_theme($id) {        

    }
    
    public function remove_theme($id) {        

    }
    
    public function install_theme() {        

    }
    
}