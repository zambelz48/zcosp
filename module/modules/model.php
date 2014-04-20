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

    public function get_rows() {
        $result = '';

        try {
            $query = $this->db->select($this->db_table);

            while($row = $this->db->fetch($query)) {
                $result[] = array(
                    'id'                => $row['id'],
                    'module_name'       => $row['module_name'],
                    'menu_admin_alias'  => $row['menu_admin_alias'],
                    'menu_site_alias'   => $row['menu_site_alias'],
                    'total_size'        => $row['total_size'],
                    'created'           => $row['created']
                );
            }
        } catch(Exception $e) {
            $result = $e->getMessage();
        }

        return $result;
    }
    
}