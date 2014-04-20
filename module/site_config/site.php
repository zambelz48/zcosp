<?php if(!defined('Z_KEY')) exit('Access denied !');

/**
 * Z-COSP (ZAMBELZ - CMS Open Source Project)
 * @package module/site_config site
 * @license Open Source
 * @author Nanda . J . A
 * @copyright 2013
 */

class Site_config_site extends Z_Controller {
    
    public function __construct() {
        parent::init('site');
        $this->load->model('modules');
        $this->load->model('site_config');
    }
    
    private function breadcrumb_link() {
        if($_GET['page'] == '' || $_GET['page'] == 'home') {
            $this->view->assign('breadcrumb', 'home.html');
        } else {
            foreach($this->modules->get_rows() as $page) {
                if($_GET['page'] == $page['module_name']) {

                    $page_name = ucfirst(str_replace('_', ' ', $page['module_name']));
                    $page_name = ucfirst(str_replace(' page', '', $page_name));

                    $this->view->assign('breadcrumb', $page_name);
                }
            }
        }
    }
    
    public function view_header() {
        $this->breadcrumb_link();
        $this->view->display('header.tpl');
    }
    
    public function view_footer() {
        $site = $this->site_config->get_row();
        
        $this->view->assign('site_footer', $site['site_footer']);
        $this->view->display('footer.tpl');
    }

    public function view() {}
    
}