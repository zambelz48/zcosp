<?php if(!defined('Z_KEY')) exit('Access denied !');

/**
 * Z-COSP (ZAMBELZ - CMS Open Source Project)
 * @package site_config model
 * @license Open Source
 * @author Nanda . J . A
 * @copyright 2013
 */

class Site_config_model extends Z_Model {    
    
    private $db_table = 'site_config';

    public function get_row() {
        $query = $this->db->select($this->db_table);
        $row = $this->db->fetch($query);

        return array(
            'id'                => $row['id'],
            'site_name'         => $row['site_name'],
            'site_author'       => $row['site_author'],
            'email_forwarder'   => $row['email_forwarder'],
            'site_slogan'       => $row['site_slogan'],
            'site_footer'       => $row['site_footer'],
            'site_meta_desc'    => $row['site_meta_desc'],
            'site_meta_key'     => $row['site_meta_key'],
            'site_status'       => $row['site_status'],
            'offline_message'   => $row['offline_message'],
            'date_updated'      => $row['date_updated']
        );
    }

    public function update($id) {
        $values = array(
            'site_name'         => $_POST['site_name'],
            'site_author'       => $_POST['site_author'],
            'email_forwarder'   => $_POST['email_forwarder'],
            'site_slogan'       => $_POST['site_slogan'],
            'site_footer'       => $_POST['site_footer'],
            'site_meta_desc'    => $_POST['site_meta_desc'],
            'site_meta_key'     => $_POST['site_meta_key'],
            'site_status'       => $_POST['site_status'],
            'offline_message'   => $_POST['offline_message'],
            'date_updated'      => current_date_time()
        );

        return $this->db->update($this->db_table, $values, 'id='.$id);
    }

    public function get_base_metadata() {
        $query = $this->db->select($this->db_table, 'site_meta_desc, site_meta_key');
        $row = $row = $this->db->fetch($query);

        return array(
            'site_meta_desc'    => $row['site_meta_desc'],
            'site_meta_key'     => $row['site_meta_key']
        );
    }
    
}