<?php if(!defined('Z_KEY')) exit('Access denied !');

/**
 * Z-COSP (ZAMBELZ - CMS Open Source Project)
 * @package module/home_slider admin
 * @license Open Source
 * @author Nanda . J . A
 * @copyright 2013
 */

class Home_slider_admin extends Z_Controller {
    
    private $img_dir;
    
    public function __construct() {
        parent::init('admin', 'home_slider');
        $this->img_dir = IMG_SLIDER_PATH;
        $this->load->model('home_slider', 'hs');
        $this->load->model('product');
    }
    
    private function home_slider_list() {
        $home_slider = $this->hs->get_all_home_slider('', 'all_records');
        $total_home_slider = $this->hs->get_all_home_slider('', 'total_data');
         
        $this->delete_home_slider();
         
        $thead = array( '<th>Gambar</th>',
                        '<th>Status</th>',
                        '<th>Tgl dibuat</th>', 
                        '<th>Tgl diupdate</th>');
                        
        parent::table_config(   'home_slider', 'daftar home slider', 
                                'Tambah', 'Hapus',
                                $thead, $home_slider, $total_home_slider);
    }
    
    private function delete_home_slider() {
        $check = $_POST['check'];
        $total_checked = count($check);
        
        if($total_checked > 0) {
            for($i=0; $i<$total_checked; $i++) {
                $this->hs->delete_home_slider($check[$i]);                
            }
            
            redirect($this->base_link);    
        }   
    }
    
    private function product_data($id_product = '') {
        $product = $this->product->get_all_product('', '', 'all_records');
        $total_product = $this->product->get_all_product('', '', 'total_data');
        
        $data = '<select name="id_product" class="span4">';        
        $data .= '<option value="0">- Pilih produk -</option>';
        
        if($total_product > 0) {        
            foreach($product as $p) {
                if($id_product == $p['id']) {
                    $selected = 'selected';    
                } else {
                    $selected = '';
                }
                $data .= '<option value="'.$p['id'].'" '.$selected.'>'. ucfirst($p['name']).'</option>';
            }
        }
        
        $data .= '</select>';
        
        return $data;
    }
    
    private function radio_config($name = '', $y = '' , $n = '') {
        return '<label>'.html_input('radio', array('name="'.$name.'"', 'value="Y"', $y)).'Aktif</label>
                <label>'.html_input('radio', array('name="'.$name.'"', 'value="N"', $n)).'Non-aktif</label>';
    }
    
    private function home_slider_data($id = '', $status, $id_product = '') {        
        return array(
            array('label' => '',        'input' => html_input('hidden', array('name="id"', 'value="'.$id.'"'))),
            array('label' => 'Product', 'input' => $this->product_data($id_product)),
            array('label' => 'Gambar',  'input' => html_input('file', array('name="image"', 'class="span6"'))),
            array('label' => 'Status',  'input' => $status),                                    
        );        
    }
    
    private function form_data($form_title, $form_data) {            
        $button = array(html_input('submit', array('value="Simpan"', 'class="btn btn-success"')));
        parent::form_config('', '', $form_data, $form_title, $button);
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
            $query = $this->hs->save_home_slider($image);    
        } else if($mode == 'update') {
            $query = $this->hs->update_home_slider($id, $image);
        }       
            
        if($query) {                
            if(!empty($img_src)) {
                img_upload($img_src, $this->img_dir, $image, 'slider', 962, 356);
                unlink($this->img_dir.$image);
            }
                
            parent::alert( 'success', 'Berhasil !', 'Data home slider berhasil disimpan ! 
                            Silahkan tambah data lagi atau <a href='.$this->base_link.'>Klik disini</a> 
                            untuk kembali');
        } else {
            parent::alert('error', 'Gagal !', 'Data home slider gagal disimpan !');
        }
    }
    
    private function add_home_slider() {
        if($_POST) {
            $this->saving('new');
        }
        
        $status = $this->radio_config('is_active', 'checked', '');
        
        $home_slider_data = $this->home_slider_data('', $status);
        
        $this->form_data('Data slider baru', $home_slider_data);
    }
    
    private function edit_home_slider() {
        $hs = $this->hs->get_home_slider($_GET['id']);
        
        if($_POST) {
            $this->saving('update', $_GET['id'], $hs['image']);
        }        
        
        $status = $this->radio_config('is_active', 'checked', '');
        
        $home_slider_data = $this->home_slider_data('', $status, $hs['id_product']);
        
        $this->form_data('Ubah data slider', $home_slider_data);
    }
    
    public function view() {
        switch($_GET['act']) {
            case 'add' :
                $this->add_home_slider();
            break;
            
            case 'edit' :
                $this->edit_home_slider();
            break;
            
            default :
                $this->home_slider_list();
            break;
        }
    }
    
}


?>