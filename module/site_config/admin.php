<?php if(!defined('Z_KEY')) exit('Access denied !');

/**
 * Z-COSP (ZAMBELZ - CMS Open Source Project)
 * @package module/site_config
 * @license Open Source
 * @author Nanda . J . A
 * @copyright 2013
 */

class Site_config_admin extends Z_Controller {
    
    public function __construct() {
        parent::init('admin');
        $this->load->model('site_config');
        $this->load->model('product');        
    }
    
    private function radio_config($name = '', $on = '', $off = '') {
        return '<label>'.html_input('radio', array('name="'.$name.'"', 'value="online"', $on)).'Online</label>
                <label>'.html_input('radio', array('name="'.$name.'"', 'value="offline"', $off)).'Offline</label>';
    }
    
     
    
    private function site_data( $id, $date_updated, $site_name, $site_author,
                                $site_slogan, $site_footer, $site_status,
                                $offline_message, $site_meta_desc, $site_meta_key) {
        return array(
            array('label' => 'Terakhir Di update',  'input' => html_input('text', array('value="'.$date_updated.'"', 'disabled')).html_input('hidden', array('name="id"', 'value="'.$id.'"'))),  
            array('label' => 'Nama website',        'input' => html_input('text', array('name="site_name"', 'id="site_name"', 'value="'.$site_name.'"', 'class="span3"'))),
            array('label' => 'Nama pemilik',        'input' => html_input('text', array('name="site_author"', 'value="'.$site_author.'"', 'class="span3"'))), 
            array('label' => 'Slogan',              'input' => html_input('text', array('name="site_slogan"', 'value="'.$site_slogan.'"', 'class="span6"'))), 
            array('label' => 'Teks footer',         'input' => html_input('text', array('name="site_footer"', 'value="'.$site_footer.'"', 'class="span6"'))),
            array('label' => 'Status',              'input' => $site_status),
            array('label' => 'Pesan Offline',       'input' => html_textarea(array('name="offline_message"', 'class="span6"'), $offline_message)),
            array('label' => 'Meta Description',    'input' => html_textarea(array('name="site_meta_desc"', 'class="span6"'), $site_meta_desc)),
            array('label' => 'Meta Keywords',       'input' => html_textarea(array('name="site_meta_key"', 'class="span6"'), $site_meta_key))
        );
    }
    
    private function profile_data($profile = '') {
        return array(
            array('label' => 'No.Telp/Hp',  'input' => html_input('text', array('value="'.$date_updated.'"'))),
            array('label' => 'Email',       'input' => html_input('text', array('value="'.$date_updated.'"'))),
            array('label' => 'facebook',    'input' => html_input('text', array('value="'.$date_updated.'"'))),
            array('label' => 'Twitter',     'input' => html_input('text', array('value="'.$date_updated.'"'))),
            array('label' => 'Profile',     'input' => html_textarea(array('name="profile"', 'id="tinymce_editor"'), $profile))            
        );
    }
    
    private function form_data($form_title, $site_data, $profile) {
        $tab_data = array(
            array(  'tab_active'        => 'active',   
                    'tab_link'          => 'site-config', 
                    'tab_title'         => 'Data Website', 
                    'tab_data'          => $site_data),
                    
            array(  'tab_link'          => 'profile-config', 
                    'tab_title'         => 'Profile Website', 
                    'tab_data'          => $profile)
        );
        
        $button = array(html_input('submit', array('value="Simpan"', 'class="btn btn-success"')));
        parent::form_config('yes', $tab_data, '', $form_title, $button);
    }
    
    private function site_config() {
        if($_POST) {            
            if(!empty($_POST['site_name'])) {
                $site = $this->site_config->update_config($_POST['id']);
                
                if($site) {
                    parent::alert('success', 'Berhasil !', 'Data konfigurasi website berhasil disimpan !');
                } else {
                    parent::alert('error', 'Gagal !', 'Data konfigurasi website gagal disimpan !');
                }    
            }                                   
        }
        
        $conf = $this->site_config->base_config();
        
        if($conf['site_status'] == 'online') {
            $site_status = $this->radio_config('site_status', 'checked');            
        } else {            
            $site_status = $this->radio_config('site_status', '', 'checked');
        }
        
        $site_data = $this->site_data(  $conf['id'], $conf['date_updated'], $conf['site_name'], 
                                        $conf['site_author'], $conf['site_slogan'], $conf['site_footer'],
                                        $site_status, $conf['offline_message'], $conf['site_meta_desc'],
                                        $conf['site_meta_key']);
        
        $profile = $this->profile_data();
                                        
        $this->form_data('Konfigurasi website', $site_data, $profile);        
    }
    
    public function view() {
        $this->site_config();        
    }
    
}

?>