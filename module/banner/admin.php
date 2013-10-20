<?php if(!defined('Z_KEY')) exit('Access denied !');

/**
 * Z-COSP (ZAMBELZ - CMS Open Source Project)
 * @package module/banner admin
 * @license Open Source
 * @author Nanda . J . A
 * @copyright 2013
 */

class Banner_admin extends Z_Controller {
    
    public function __construct() {
        parent::init('admin', 'banner');
        $this->img_dir = IMG_BANNER_PATH;
        $this->load->model('banner');
    }
    
    public function banner_list() {
        $banner = $this->banner->get_all_banner('', 'all_records');
        $total_banner = $this->banner->get_all_banner('', 'total_data');
        
        $this->delete_banner();
         
        $thead = array( '<th>Nama Banner</th>',
                        '<th>Status</th>',
                        '<th>Tgl dibuat</th>', 
                        '<th>Tgl diupdate</th>');
                        
        parent::table_config(   'banner', 'daftar banner', 
                                'Tambah', 'Hapus',
                                $thead, $banner, $total_banner);
    }
    
    public function delete_banner() {
        $check = $_POST['check'];
        $total_checked = count($check);
        
        if($total_checked > 0) {
            for($i=0; $i<$total_checked; $i++) {
                $this->banner->delete_banner($check[$i]);                
            }
            
            redirect($this->base_link);    
        }   
    }
    
    private function banner_position($id_banner = '') {
        $banner = $this->banner->get_banner($id_banner);
        
        $data = '<select name="position" class="span4">';        
        
        if($banner['position'] == 'head') {
            $selected = 'selected';    
        } else if($banner['position'] == 'middle') {
            $selected = 'selected';
        } else if($banner['position'] == 'side') {
            $selected = 'selected';
        } else if($banner['position'] == 'bottom') {
            $selected = 'selected';
        } else {
            $selected = '';
        }
            
        $data .= '<option value="head" '.$selected.'>Atas</option>
                  <option value="middle" '.$selected.'>Tengah</option>
                  <option value="side" '.$selected.'>Samping</option>
                  <option value="bottom" '.$selected.'>Bawah</option>
                  </select>';
        
        return $data;
    }
    
    private function radio_config($name = '', $y = '' , $n = '') {
        return '<label>'.html_input('radio', array('name="'.$name.'"', 'value="Y"', $y)).'Aktif</label>
                <label>'.html_input('radio', array('name="'.$name.'"', 'value="N"', $n)).'Non-aktif</label>';
    }
    
    private function form_data($form_title, $form_data) {            
        $button = array(html_input('submit', array('value="Simpan"', 'class="btn btn-success"')));
        parent::form_config('', '', $form_data, $form_title, $button);
    }
    
    private function banner_data($id = '', $name = '', $link = '', $description = '', $id_banner = '', $status) {
        return array(
            array('label' => '',            'input' => html_input('hidden', array('name="id"', 'value="'.$id.'"', 'class="span1"'))),
            array('label' => 'Nama banner', 'input' => html_input('text', array('name="name"', 'value="'.$name.'"', 'class="span6"'))),
            array('label' => 'Gambar',      'input' => html_input('file', array('name="image"', 'class="span6"'))),
            array('label' => 'link',        'input' => html_input('text', array('name="link"', 'value="'.$link.'"', 'class="span6"'))),
            array('label' => 'Keterangan',  'input' => html_textarea(array('name="description"', 'class="span6"'), $description)),
            array('label' => 'Posisi',      'input' => $this->banner_position($id_banner = '')),
            array('label' => 'Status',      'input' => $status),                                  
        ); 
    }
    
    private function saving($mode = '', $id = '', $image_name = '') {
        $img_src  = $_FILES['image']['tmp_name'];
        $img_name = $_FILES['image']['name'];
        $img_type = $_FILES['image']['type'];
        $img_size = $_FILES['image']['size'];
            
        $rand = rand(000000,999999);
        $uniq_file_name = $rand . $img_name;           
                
        if(empty($img_src)) {
            $image = $image_name;
        } else {
            $image = $uniq_file_name;                
        }
        
        if($mode == 'new') {
            $query = $this->banner->save_banner($image);    
        } else if($mode == 'update') {
            $query = $this->banner->update_banner($id, $image);   
        }
            
        if($query) {                
            if(!empty($img_src)) {
                img_upload($img_src, $this->img_dir, $image, 'thumb');
            }
                
            parent::alert(  'success', 'Berhasil !', 'Data banner berhasil disimpan ! 
                            <a href='.$this->base_link.'>Klik disini</a> untuk kembali');
        } else {
            parent::alert('error', 'Gagal !', 'Data banner gagal disimpan !');
        }
    }
    
    private function add_banner() {
        if($_POST) {
            $this->saving('new');    
        }
        
        $status = $this->radio_config('is_active', 'checked', '');
        $form_data = $this->banner_data('', '', '', '', '', $status);
        $this->form_data('Data banner baru', $form_data);
    }
    
    private function edit_banner() {
        $banner = $this->banner->get_banner($_GET['id']);
        
        if($_POST) {
            $this->saving('update', $banner['id'], $banner['image']);    
        }
        
        if($banner['is_active'] == 'Y') {            
            $status = $this->radio_config('is_active', 'checked', '');
        } else {            
            $status = $this->radio_config('is_active', '', 'checked');
        }
        
        $form_data = $this->banner_data($banner['id'], $banner['name'], $banner['link'], 
                                        $banner['description'], $banner['id'], $status);
                                        
        $this->form_data('Ubah data banner', $form_data);
    }
    
    public function view() {
        switch($_GET['act']) {
            case 'add' :
                $this->add_banner();
            break;
            
            case 'edit' :
                $this->edit_banner();
            break;
            
            default :                
                $this->banner_list();
            break;
        }
    }
    
}

?>