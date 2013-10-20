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
    
    /**
     * Akses Konfigurasi site di database
     * @access public
     **/
    public function base_config() {        
        parent::model('select');
        
        $this->db->select();
        $this->db->table($this->db_table);
        
        $query = $this->db->build();
        
        $site = $this->db->fetch_array($query);
        
        return array(   'id'               => $site['id'],
                        'site_name'        => $site['site_name'],
                        'site_author'      => $site['site_author'],
                        'site_slogan'      => $site['site_slogan'],
                        'site_footer'      => $site['site_footer'],
                        'site_meta_desc'   => $site['site_meta_desc'],
                        'site_meta_key'    => $site['site_meta_key'],
                        'site_status'      => $site['site_status'],
                        'offline_message'  => $site['offline_message'],
                        'date_updated'     => $site['date_updated']);        
    }
    
    public function update_config($id) {
        parent::model('update');
        
        $date = date("Y-m-d") .' '. date("H:i:s", time());
        $data = array(  'site_name'         => $_POST['site_name'],
                        'site_author'       => $_POST['site_author'],
                        'site_slogan'       => $_POST['site_slogan'],
                        'site_footer'       => $_POST['site_footer'],
                        'site_meta_desc'    => $_POST['site_meta_desc'],
                        'site_meta_key'     => $_POST['site_meta_key'],
                        'site_status'       => $_POST['site_status'],
                        'offline_message'   => $_POST['offline_message'],
                        'date_updated'      => $date);
        
        $this->db->table($this->db_table);
        $this->db->update($data);
        $this->db->where('id = "'.$id.'"');
        
        return $this->db->build();
    }
    
}

?>