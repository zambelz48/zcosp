<?php if(!defined('Z_KEY')) exit('Access denied !');

/**
 * Z-COSP (ZAMBELZ - CMS Open Source Project)
 * @package module/product_brand admin
 * @license Open Source
 * @author Nanda . J . A
 * @copyright 2013
 */

class Product_brand_admin extends Z_Controller {
    
    private $img_dir;
    
    public function __construct() {
        parent::init('admin', 'product_brand');
        $this->img_dir = IMG_BRAND_PATH;
        $this->load->model('product_brand', 'brand');
    }
    
    private function brand_list() {
        $brand = $this->brand->get_all_brand('all_records');
        $total_brand = $this->brand->get_all_brand('total_data');
        
        $this->delete_brand();
        
        $thead = array( '<th>Nama brand</th>',
                        '<th>Tgl dibuat</th>',
                        '<th>Tgl diupdate</th>');
        
        parent::table_config(   'brand', 'daftar brand',
                                'tambah', 'hapus',
                                $thead, $brand, $total_brand);
    }
    
    private function delete_brand() {
        $check = $_POST['check'];
        $total_checked = count($check);
        
        if($total_checked > 0) {
            for($i=0; $i<$total_checked; $i++) {
                $this->brand->delete_brand($check[$i]);
            }
            
            redirect($this->base_link);    
        }
    }
    
    private function radio_config($name = '', $y = '' , $n = '') {
        return '<label>'.html_input('radio', array('name="'.$name.'"', 'value="Y"', $y)).'Ya</label>
                <label>'.html_input('radio', array('name="'.$name.'"', 'value="N"', $n)).'Tidak</label>';
    }
    
    private function brand_data($id = '', $name = '', $image = '', $web = '', $description = '') {
        return array(
            array('label' => 'ID : <b>'.$id.'</b>','input' => html_input('hidden', array('name="id"', 'value="'.$id.'"', 'class="span1"'))),            
            array('label' => 'Nama brand',      'input' => html_input('text', array('name="name"', 'value="'.$name.'"', 'id="name"', 'class="span3"'))),            
            array('label' => 'Link website',    'input' => html_input('text', array('name="web"', 'value="'.$web.'"', 'class="span3"'))),
            array('label' => 'Keterangan',      'input' => html_textarea(array('name="description"', 'id="tinymce_editor"'), $description))                        
        );
    }
    
    private function brand_config($publish = '', $meta_desc = '', $meta_key = '') {
        return array(
            array('label' => 'Publish',             'input' => $publish),
            array('label' => 'Gambar',              'input' => html_input('file', array('name="image"', 'class="span3"'))),
            array('label' => 'Meta Description',    'input' => html_textarea(array('name="meta_desc"', 'class="span6"'), $meta_desc)),
            array('label' => 'Meta Keyword',        'input' => html_textarea(array('name="meta_key"', 'class="span6"'), $meta_key))                        
        );
    }
    
    private function form_data($form_title, $brand_data, $brand_config) {
        $tab_data = array(
            array(  'tab_active'        => 'active',   
                    'tab_link'          => 'brand-data', 
                    'tab_title'         => 'Data Brand', 
                    'tab_data'          => $brand_data),
                    
            array(  'tab_link'          => 'brand-config', 
                    'tab_title'         => 'Konfigurasi', 
                    'tab_data'          => $brand_config)
        );
        
        $button = array(html_input('submit', array('value="Simpan"', 'class="btn btn-success"')));
        parent::form_config('yes', $tab_data, '', $form_title, $button);                
    }
    
    private function add_brand() {
        if($_POST) {
            $img_src  = $_FILES['image']['tmp_name'];
            $img_name = $_FILES['image']['name'];
            $img_type = $_FILES['image']['type'];
            $img_size = $_FILES['image']['size'];
                
            $dir  = $this->img_dir;   
            $rand = rand(000000,999999);
            $uniq_file_name = $rand . $img_name;           
                
            if(empty($img_src)) {
                $image = '';
            } else {
                $image = $uniq_file_name;                
            }
            
            $query = $this->brand->save_brand($image);
            
            if($query) {
                
                if(!empty($img_src)) {
                    img_upload($img_src, $dir, $image, 'thumb');
                }
                
                parent::alert(  'success', 'Berhasil !', 'Data brand berhasil disimpan ! 
                                 Silahkan tambah data lagi atau <a href='.$this->base_link.'>Klik disini</a> 
                                 untuk kembali');
            } else {
                parent::alert('error', 'Gagal !', 'Data brand gagal disimpan !');
            }
        }
        
        $publish = $publish = $this->radio_config('publish', 'checked', '');
        $brand_data = $this->brand_data();
        $brand_config = $this->brand_config($publish);
        
        $this->form_data('Data brand baru', $brand_data, $brand_config);
    }
    
    private function edit_brand() {
        $brand = $this->brand->get_brand($_GET['id']);
        
        if($_POST) {
            $img_src  = $_FILES['image']['tmp_name'];
            $img_name = $_FILES['image']['name'];
            $img_type = $_FILES['image']['type'];
            $img_size = $_FILES['image']['size'];
                
            $dir  = $this->img_dir;   
            $rand = rand(000000,999999);
            $uniq_file_name = $rand . $img_name;           
                
            if(empty($img_src)) {
                $image = $brand['image'];
            } else {
                $image = $uniq_file_name;                
            }
            
            $query = $this->brand->update_brand($_GET['id'], $image);
            
            if($query) {                
                if(!empty($img_src)) {
                    img_upload($img_src, $dir, $image, 'thumb');
                }
                
                parent::alert('success', 'Berhasil !', 'Data brand berhasil diubah !');
            } else {
                parent::alert('error', 'Gagal !', 'Data brand gagal diubah !');
            }
        }
        
        if($brand['publish'] == 'Y') {            
            $publish = $this->radio_config('publish', 'checked', '');
        } else {            
            $publish = $this->radio_config('publish', '', 'checked');
        }
        
        $brand_data = $this->brand_data($_GET['id'], $brand['name'], 
                                        $brand['image'], $brand['description']);
        
        $brand_config = $this->brand_config($publish, $brand['meta_desc'], $brand['meta_key']);
        
        $this->form_data('Ubah data brand', $brand_data, $brand_config);
    }
    
    public function view() {
        switch($_GET['act']) {
            case 'add' :
                $this->add_brand();
            break;
            
            case 'edit' :
                $this->edit_brand();
            break;
            
            default :
                $this->brand_list();                
            break;
        }
    }
    
}

?>