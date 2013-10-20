<?php if(!defined('Z_KEY')) exit('Access denied !');

/**
 * Z-COSP (ZAMBELZ - CMS Open Source Project)
 * @package module/site_profile admin
 * @license Open Source
 * @author Nanda . J . A
 * @copyright 2013
 */

class Site_profile_admin extends Z_Controller {
    
    public function __construct() {
        parent::init('admin', 'site_profile');
        $this->load->model('site_profile', 'profile');    
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
    
    private function form_data($form_title, $form_data) {        
        $button = array(html_input('submit', array('value="Simpan"', 'class="btn btn-success"')));
        parent::form_config('', '', $form_data, $form_title, $button);
    }
    
    private function site_profile() {
        if($_POST) {            
            if(!empty($_POST['site_name'])) {
                $site = $this->profile->update_profile($_POST['id']);
                
                if($site) {
                    parent::alert('success', 'Berhasil !', 'Data konfigurasi website berhasil disimpan !');
                } else {
                    parent::alert('error', 'Gagal !', 'Data konfigurasi website gagal disimpan !');
                }    
            }                                   
        }
        
        $profile = $this->profile->base_profile();
        
        if($profile['site_status'] == 'online') {
            $site_status = $this->radio_config('site_status', 'checked');            
        } else {            
            $site_status = $this->radio_config('site_status', '', 'checked');
        }
        
        $site_data = $this->site_data(  $profile['id'], $profile['date_updated'], $profile['site_name'], 
                                        $profile['site_author'], $profile['site_slogan'], $profile['site_footer'],
                                        $site_status, $profile['offline_message'], $profile['site_meta_desc'],
                                        $profile['site_meta_key']);
                                        
        $this->form_data('Konfigurasi website', $site_data);        
    }
    
    public function view() {
        $this->site_profile();        
    }
    
}

?>