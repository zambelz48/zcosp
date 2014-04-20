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
    
    public function multilevel_menu($id = '') {
        $where_clause = '';
                    
        if(strlen($id) > 0) {
            $where_clause = 'parent="'.$id.'"';
        }

        $query = parent::sql_query('select', $this->db_table, '', $where_clause);

        $num = parent::sql_query_exec('num_rows', $query);
        
        $i = 0;
        $data = '';
                
        while($pcat = parent::sql_query_exec('fetch_array', $query)) {
            $pcat_name = strtolower(preg_replace('/\s/','_',$pcat['name']));
            $url = 'product-category-'.$pcat['id'].'-'.$pcat_name.'.html';
            
            if($i == 0) {
                if($pcat['parent'] == 0) {
                    $data = '<ul>';
                } else {                    
                    $data = '<div><ul>';   
                }                
            }         
                                        
            $i++;
            
            $data .= '<li><a href="'.$url.'">'.strtoupper($pcat['name']).'</a>';
                
            $data .= $this->get_multilevel($pcat['id']);
                                                    
            $data .= '</li>';
                                        
            if($i == $num) {
                if($pcat['parent'] == 0) {
                    $data .= '</ul>';
                } else {                    
                    $data .= '</ul></div>';   
                }                      
            }
        }
        
        return $data;
    }
}