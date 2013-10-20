<?php if(!defined('Z_KEY')) exit('Access denied !');

/**
 * Z-COSP (ZAMBELZ - CMS Open Source Project)
 * @package menu model
 * @license Open Source
 * @author Nanda . J . A
 * @copyright 2013
 */

class Menu_model extends Z_Model {
    
    private $db_table = 'site_menu';
    
    public function get_site_menu() {
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
    
    public function get_admin_menu() {        
        if($_SESSION['user_type'] == 0) {
            $menu = array(  'home'              => 'home', 
                            'site_config'       => 'site_config', 
                            'user_config'       => 'user', 
                            'customer_config'   => 'customer', 
                            'product'           => 'product', 
                            'order'             => 'order',
                            'product_category'  => 'product_category',
                            'brand'             => 'product_brand',
                            'comments'          => 'comments', 
                            'modules'           => 'modules', 
                            'themes'            => 'themes');    
        } else {
            $menu = array(  'home'              => 'home',
                            'customer_config'   => 'customer', 
                            'product'           => 'product', 
                            'product_category'  => 'product_category',
                            'comments'          => 'comments',
                            'themes'            => 'themes',
                            'my_profile'        => 'user_profile');
        }
        
        return $menu;
    }
    
}

?>