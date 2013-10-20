<?php if(!defined('Z_KEY')) exit('Access denied !');

/**
 * Z-COSP (ZAMBELZ - CMS Open Source Project)
 * @package module/product_category admin
 * @license Open Source
 * @author Nanda . J . A
 * @copyright 2013
 */

class Product_category_admin extends Z_Controller {
    
    private $img_dir;
    
    public function __construct() {
        parent::init('admin', 'product_category');
        $this->img_dir = IMG_PRODUCT_CATEGORY_PATH;
        $this->load->model('product_category', 'pcategory');
    }
    
    private function category_list() {
        $pcategory = $this->pcategory->get_all_pcategory('all_records');
        $total_pcategory = $this->pcategory->get_all_pcategory('total_data');
        
        $thead = array( '<th>Nama Kategori</th>', 
                        '<th>Tgl buat</th>', 
                        '<th>Tgl diperbaharui</th>');
        
        $this->delete_pcategory();
                                                
        parent::table_config(   'product_category', 'daftar kategori produk',
                                'tambah', 'hapus',
                                $thead, $pcategory, $total_pcategory);
    }
    
    private function delete_pcategory() {
        $check = $_POST['check'];
        $total_checked = count($check);
        
        if($total_checked > 0) {
            for($i=0; $i<$total_checked; $i++) {
                $this->pcategory->delete_pcategory($check[$i]);
            }
            
            redirect($this->base_link);    
        } 
    }
    
    private function pcategory_parent($id = '') {
        $pcategory_parent = $this->pcategory->get_pcategory($id);
        $all_pcategory = $this->pcategory->get_all_pcategory('all_records');
        
        $data = '<select name="id_product_category" class="span4">';
        $data .= '<option value="0">- Pilih parent -</option>';
        
        foreach($all_pcategory as $apc) {
            if($pcategory_parent['parent'] == $apc['id']) {
                $selected = 'selected';    
            } else {
                $selected = '';
            }
            
            $data .= '<option value="'.$apc['id'].'"' .$selected.'>'. ucfirst($apc['name']).'</option>';
        }
        
        $data .= '</select>';
        
        return $data;
    }
    
    private function radio_config($name = '', $y = '' , $n = '') {
        return '<label>'.html_input('radio', array('name="'.$name.'"', 'value="Y"', $y)).'Ya</label>
                <label>'.html_input('radio', array('name="'.$name.'"', 'value="N"', $n)).'Tidak</label>';
    }
    
    private function pcategory_data($id = '', $parent_id = '', $name = '', $image = '', $description = '') {
        return array(
            array('label' => 'ID : <b>'.$id.'</b>','input' => html_input('hidden', array('name="id"', 'value="'.$id.'"', 'class="span1"'))),
            array('label' => 'Parent',          'input' => $this->pcategory_parent($parent_id)),
            array('label' => 'Nama kategori',   'input' => html_input('text', array('name="name"', 'value="'.$name.'"', 'id="name"', 'class="span3"'))),                        
            array('label' => 'Keterangan',      'input' => html_textarea(array('name="description"', 'id="tinymce_editor"'), $description))                        
        );
    }
    
    private function pcategory_config($publish = '', $meta_desc = '', $meta_key = '') {
        return array(
            array('label' => 'Publish',             'input' => $publish),
            array('label' => 'Gambar',              'input' => html_input('file', array('name="image"', 'class="span3"'))),
            array('label' => 'Meta Description',    'input' => html_textarea(array('name="meta_desc"', 'class="span6"'), $meta_desc)),
            array('label' => 'Meta Keyword',        'input' => html_textarea(array('name="meta_key"', 'class="span6"'), $meta_key))                        
        );
    }
    
    private function form_data($form_title, $pcategory_data, $pcategory_config) {
        $tab_data = array(
            array(  'tab_active'        => 'active',   
                    'tab_link'          => 'product-category', 
                    'tab_title'         => 'Data Kategori Produk', 
                    'tab_data'          => $pcategory_data),
                    
            array(  'tab_link'          => 'product-category-config', 
                    'tab_title'         => 'Konfigurasi', 
                    'tab_data'          => $pcategory_config)
        );
        
        $button = array(html_input('submit', array('value="Simpan"', 'class="btn btn-success"')));
        parent::form_config('yes', $tab_data, '', $form_title, $button);                
    }
    
    private function add_pcategory() {
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
            
            $query = $this->pcategory->save_pcategory($image);
            
            if($query) {
                
                if(!empty($img_src)) {
                    img_upload($img_src, $dir, $image, 'thumb');
                }
                
                parent::alert(  'success', 'Berhasil !', 'Data kategori produk berhasil disimpan ! 
                                 Silahkan tambah data lagi atau <a href='.$this->base_link.'>Klik disini</a> 
                                 untuk kembali');
            } else {
                parent::alert('error', 'Gagal !', 'Data kategori produk gagal disimpan !');
            }
        }
        
        $publish = $this->radio_config('publish', 'checked', '');
        $pcategory_data = $this->pcategory_data();
        $pcategory_config = $this->pcategory_config($publish);
        
        $this->form_data('Data kategori produk baru', $pcategory_data, $pcategory_config);
    }
    
    private function edit_pcategory() {
        $pcategory = $this->pcategory->get_pcategory($_GET['id']);
        
        if($_POST) {
            $img_src  = $_FILES['image']['tmp_name'];
            $img_name = $_FILES['image']['name'];
            $img_type = $_FILES['image']['type'];
            $img_size = $_FILES['image']['size'];
                
            $dir  = $this->img_dir;   
            $rand = rand(000000,999999);
            $uniq_file_name = $rand . $img_name;           
                
            if(empty($img_src)) {
                $image = $pcategory['image'];
            } else {
                $image = $uniq_file_name;                
            }
            
            $query = $this->pcategory->update_pcategory($_GET['id'], $image);
            
            if($query) {
                
                if(!empty($img_src)) {
                    img_upload($img_src, $dir, $image, 'thumb');
                }
                
                parent::alert(  'success', 'Berhasil !', 'Data kategori produk berhasil disimpan ! 
                                 Silahkan tambah data lagi atau <a href='.$this->base_link.'>Klik disini</a> 
                                 untuk kembali');
            } else {
                parent::alert('error', 'Gagal !', 'Data kategori produk gagal disimpan !');
            }
        }
        
        if($pcategory['publish'] == 'Y') {            
            $publish = $this->radio_config('publish', 'checked', '');
        } else {            
            $publish = $this->radio_config('publish', '', 'checked');
        }        
        
        $pcategory_data = $this->pcategory_data($_GET['id'], $_GET['id'], 
                                                $pcategory['name'], $pcategory['image'], 
                                                $pcategory['description']);
                                                        
        $pcategory_config = $this->pcategory_config($publish, $pcategory['meta_desc'], $pcategory['meta_key']);
                   
        $this->form_data('Ubah data kategori produk', $pcategory_data, $pcategory_config);
    }
    
    public function view() {
        switch($_GET['act']) {
            case 'add':
                $this->add_pcategory();
            break;
            
            case 'edit':
                $this->edit_pcategory();
            break;
            
            default :
                $this->category_list();                
            break;
        }
        
    }
    
}


?>