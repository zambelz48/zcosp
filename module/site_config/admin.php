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
    }
    
    private function radio_config($name = '', $on = '', $off = '') {
        return '<label>'.html_input('radio', array('name="'.$name.'"', 'value="online"', $on)).'Online</label>
                <label>'.html_input('radio', array('name="'.$name.'"', 'value="offline"', $off)).'Offline</label>';
    }
    
    private function site_data($values = '') {
        return array(
            array(  'label' => 'Terakhir Di update',
                    'input' => html_input('text', array('value="'.$values[0].'"', 'disabled'))
                              .html_input('hidden', array('name="id"', 'value="'.$values[1].'"'))),

            array(  'label' => 'Nama website',
                    'input' => html_input('text', array('name="site_name"', 'id="site_name"', 'value="'.$values[2].'"', 'class="span3"'))),

            array(  'label' => 'Nama pemilik',
                    'input' => html_input('text', array('name="site_author"', 'value="'.$values[3].'"', 'class="span3"'))),

            array(  'label' => 'Slogan',
                    'input' => html_input('text', array('name="site_slogan"', 'value="'.$values[4].'"', 'class="span6"'))),

            array(  'label' => 'Teks footer',
                    'input' => html_input('text', array('name="site_footer"', 'value="'.$values[5].'"', 'class="span6"'))),

            array(  'label' => 'Status',
                    'input' => $values[6]),

            array(  'label' => 'Pesan Offline',
                    'input' => html_textarea(array('name="offline_message"', 'class="span6"'), $values[7])),

            array(  'label' => 'Meta Description',
                    'input' => html_textarea(array('name="site_meta_desc"', 'class="span6"'), $values[8])),

            array(  'label' => 'Meta Keywords',
                    'input' => html_textarea(array('name="site_meta_key"', 'class="span6"'), $values[9]))
        );
    }

    private function other_conf($values = '') {
        return array(
            array(  'label' => 'Email forwarder',
                    'input' => html_input('text', array('name="'.$values[0].'"',
                                                        'id="'.$values[0].'"',
                                                        'value="'.$values[0].'"',
                                                        'class="span3"')))
        );
    }
    
    private function form($form_title, $form_data) {
        $tab_data = array(
            array(  'tab_active'        => 'active',
                    'tab_link'          => 'main-config',
                    'tab_title'         => 'Website',
                    'tab_data'          => $form_data[0]),

            array(  'tab_link'          => 'other-config',
                    'tab_title'         => 'Other',
                    'tab_data'          => $form_data[1])
        );

        $button = array(html_input('submit', array('value="Simpan"', 'class="btn btn-inverse"')));
        parent::form_config('yes', $tab_data, '', $form_title, $button);
    }
    
    private function site_config() {
        if($_POST) {            
            if(!empty($_POST['site_name'])) {
                $site = $this->site_config->update($_POST['id']);
                
                if($site) {
                    parent::alert('success', 'Berhasil !', 'Data konfigurasi website berhasil disimpan !');
                } else {
                    parent::alert('error', 'Gagal !', 'Data konfigurasi website gagal disimpan !');
                }    
            }                                   
        }
        
        $row = $this->site_config->get_row();
        
        if($row['site_status'] == 'online') {
            $site_status = $this->radio_config('site_status', 'checked');            
        } else {            
            $site_status = $this->radio_config('site_status', '', 'checked');
        }

        $values_site_conf = array(  $row['date_updated'],
                                    $row['id'],
                                    $row['site_name'],
                                    $row['site_author'],
                                    $row['site_slogan'],
                                    $row['site_footer'],
                                    $site_status,
                                    $row['offline_message'],
                                    $row['site_meta_desc'],
                                    $row['site_meta_key']);

        $values_other_conf = array();

        $site_data = $this->site_data($values_site_conf);
        $other_conf = $this->other_conf($values_other_conf);

        $this->form('Konfigurasi website', array($site_data, $other_conf));
    }
    
    public function view() {
        $this->site_config();        
    }
    
}