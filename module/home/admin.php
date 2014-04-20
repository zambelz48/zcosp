<?php if(!defined('Z_KEY')) exit('Access denied !');

/**
 * Z-COSP (ZAMBELZ - CMS Open Source Project)
 * @package module/home admin
 * @license Open Source
 * @author Nanda . J . A
 * @copyright 2013
 */

class Home_admin extends Z_Controller {
    
    public function __construct() {
        parent::init('admin');
    }
    
    public function view() {
        $this->view->assign('username', ucfirst(strtolower($_SESSION['username'])));
        parent::fetch('home/home', 'module');
    }
    
}