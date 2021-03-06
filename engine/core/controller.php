<?php if(!defined('Z_KEY')) exit('Access denied !');

/**
 * Z-COSP (ZAMBELZ - CMS Open Source Project)
 * @package engine/core controller
 * @license Open Source
 * @author Nanda . J . A
 * @copyright 2013
 */

class Z_Controller {
    
    private static $instance;
    protected $load;
    protected $view;
    protected $base_link;
    
    /**
     * Inisialisasi controller
     * @param String $access = 'site' atau 'admin'
     * @param Boolean $debug, $cache = smarty config
     * @param Integer $cache_lifetime = smarty config
     * @access protected  
     */
    protected function init($access, $link = '', $debug=false, $cache=false, $cache_lifetime=120) {
        self::$instance = $this;        
        
        $this->load = new Z_Loader;
        
        $this->base_link = base_link_format($link);
        
        load_file(ENGINE_PATH.'smarty'.DS.'libs'.DS, 'Smarty.class.php');
        
        if(!class_exists('Smarty')) {
            die('Smarty class not found !');
        }
        
        $this->view = new Smarty;
        
        if($access == 'site') {
            $name = $this->theme_dir('site_theme_name', 'site');        
            $this->view->template_dir = $this->theme_dir('site_theme_path', 'site');
        } else if($access == 'admin') {
            $name = $this->theme_dir('site_theme_name', 'admin');        
            $this->view->template_dir = $this->theme_dir('site_theme_path', 'admin');
        } else {
            die('Wrong access !');
        }
        
        $this->view->compile_dir  = TEMP_PATH.'smarty'.DS.'templates_c'.DS;
        $this->view->config_dir   = TEMP_PATH.'smarty'.DS.'configs'.DS;
        $this->view->cache_dir    = TEMP_PATH.'smarty'.DS.'cache'.DS;
        $this->view->plugins_dir  = ENGINE_PATH.'plugin'.DS.'smarty'.DS.'plugins'.DS;
        
        $this->view->debugging = $debug;
        $this->view->caching = $cache;
        $this->view->cache_lifetime = $cache_lifetime;

        $this->require_files($access);

        $this->view->assign('THEME_DIR', $name);
    }

    /**
     * Include require files from system
     */
    private function require_files($access) {
        if($access == 'admin') {
            /* base js path */
            $base_js_path = '../engine/js/';

            /* base TinyMCE path */
            $base_tiny_mce_path = '../engine/editor/tinymce/';
        }

        if($access == 'site') {
            /* base js path */
            $base_js_path = './engine/js/';

            /* base TinyMCE path */
            $base_tiny_mce_path = './engine/editor/tinymce/';
        }

        $jquery = '<script src="'.$base_js_path.'jquery/jquery.js"></script>';
        $jquery_migrate = '<script src="'.$base_js_path.'jquery/jquery-migrate.js"></script>';
        $jquery_files = $jquery ."\n\t". $jquery_migrate;


        $tiny_mce = '<script type="text/javascript" src="'.$base_tiny_mce_path.'tinymce.gzip.js"></script>';
        $tiny_mce_init = '<script type="text/javascript" src="'.$base_tiny_mce_path.'init.js"></script>';
        $tiny_mce_files = $tiny_mce ."\n\t". $tiny_mce_init;

        $jquery_form_validator = '<script src="'.$base_js_path.'form-validator/jquery.form-validator.min.js"></script>';
        $jquery_form_validator_lang = '<script src="'.$base_js_path.'form-validator/languages/id.js"></script>';
        $jquery_form_validator_files = $jquery_form_validator ."\n\t". $jquery_form_validator_lang;

        /* base js path */
        $this->view->assign('JS_PATH', $base_js_path);

        /* load jQuery files */
        $this->view->assign('JQUERY_FILES', $jquery_files);

        /* load TinyMCE files */
        $this->view->assign('TINY_MCE_FILES', $tiny_mce_files);

        /* load jQuery Form Validator files */
        $this->view->assign('JQUERY_FORM_VALIDATOR_FILES', $jquery_form_validator_files);
    }
    
    /**
     * Mendapatkan instance
     * Singleton
     * @access public
     * @static
     */
    public static function &get_instance() {
        return self::$instance;
    }
    
    /**
     * Template data untuk module
     * @param String $var = variabel untuk template
     * @param String $template = nama template
     * @access protected 
     */
    protected function assign_module($var, $template) {
        $mod_folder = 'module';
        $this->view->assign($var, $mod_folder.DS.$template.DS.$template.'.tpl');
    }
    
    protected function table_config($module_name = '', $heading = '', $link_add_title = '',
                                    $link_delete_title = '',
                                    $thead = '', $tdata = '', $total_data = '') {
                                        
        $this->view->assign('heading',              strtoupper($heading));
        $this->view->assign('link_add',             $this->base_link.'&act=add');
        $this->view->assign('link_add_title',       $link_add_title);
        $this->view->assign('link_delete_title',    $link_delete_title);
        $this->view->assign('link_edit',            $this->base_link.'&act=edit&id=');
        $this->view->assign('tb_head',              $thead);                                                
        $this->view->assign('tb_data',              $tdata);
        $this->view->assign('total_data',           $total_data);

        $this->assign_module('table_content', $module_name);
        $this->fetch('table', 'component');
    }
    
    public function site_head_config($title = '', $meta_key = '', $meta_desc = '') {
        $site = mysql_fetch_array(mysql_query('SELECT site_author, site_slogan FROM site_config'));
        
        $this->view->assign('site_author', $site['site_author']);
        $this->view->assign('site_slogan', $site['site_slogan']);       
        $this->view->assign('site_title', $title);
        $this->view->assign('site_meta_key', $meta_key);
        $this->view->assign('site_meta_desc', $meta_desc);
        
        $this->fetch('head_config', 'component');
    }
    
    protected function form_config( $tabbed_content = '', $tab_data = '', $form_data = '', 
                                    $form_title = '', $button = '') {
        $this->view->assign('tabbed_content', $tabbed_content);        
        $this->view->assign('tab_data', $tab_data);
        $this->view->assign('form_data', $form_data);        
        $this->view->assign('form_title', $form_title);        
        $this->view->assign('form_button', $button);
        $this->fetch('form', 'component');
    }
    
    /**
     * Fetch data template
     * @param String $template = variabel untuk template
     * @param String $type = type folder
     * @access protected 
     */
    protected function fetch($template, $type) {
        echo $this->view->fetch($type.DS.$template.'.tpl');
    }
    
    protected function alert($type, $heading = '', $message = '') {
        $this->view->assign('alert', $type);
        $this->view->assign('alert_heading', $heading);
        $this->view->assign('alert_message', $message);
    }
    
    /**
     * Menetukan template yang aktif
     * @param String $param = parameter type
     * @param String $access = 'site' atau 'admin'
     * @access private 
     */
    private function theme_dir($param, $access) {
        switch($access) {
            case 'admin' :
                $path = THEMES_ADMIN_PATH;    
            break;
            
            case 'site' :
                $path = THEMES_SITE_PATH;
            break;
            
            default :
                die('Themes path is not defined !');
            break;
        }
        
        $query = @mysql_query('SELECT theme_name FROM themes WHERE design="'.$access.'" AND is_active = "Y"');
        $theme = @mysql_fetch_array($query);

        if(file_exists($path . $theme['theme_name'].DS.'header.tpl')) {
            if($param == 'site_theme_path') {
                return $path . $theme['theme_name'].DS;                
            }else if($param == 'site_theme_name'){
                return './themes/'.$theme['theme_name'].'/';
            } else {
                die('Wrong param !');
            }            
        } else {            
            die('Error : Themes for '.$access.' not found !');            
        }       
    }    
}