<?php if(!defined('Z_KEY')) exit('Access denied !');

/**
 * Z-COSP (ZAMBELZ - CMS Open Source Project)
 * @package module/product admin
 * @license Open Source
 * @author Nanda . J . A
 * @copyright 2013
 */

class Product_admin extends Z_Controller {
    
    private $img_dir;
    
    public function __construct() {
        parent::init('admin', 'product');
        $this->img_dir = IMG_PRODUCT_PATH;        
        $this->load->model('product');
        $this->load->model('product_brand', 'brand');
        $this->load->model('product_category', 'category');
    }
    
    /**
     * Daftar semua produk
     **/ 
    private function product_list() {
        $product = $this->product->get_all_product('', '', 'all_records');
        $total_product = $this->product->get_all_product('', '', 'total_data');
        
        $this->delete_product();
         
        $thead = array( '<th>Nama Produk</th>',
                        '<th>Tgl dibuat</th>', 
                        '<th>Tgl diupdate</th>');
                        
        parent::table_config(   'product', 'daftar produk', 
                                'Tambah', 'Hapus',
                                $thead, $product, $total_product);
    }
    
    private function delete_product() {
        $check = $_POST['check'];
        $total_checked = count($check);
        
        if($total_checked > 0) {
            for($i=0; $i<$total_checked; $i++) {
                $this->product->delete_product($check[$i]);                
            }
            
            redirect($this->base_link);    
        }        
    }
    
    /**
     * kategori produk
     **/
    private function product_category($id_product = '') {
        $product = $this->product->get_product($id_product);
        $pcategory = $this->category->get_all_pcategory('all_records');
        
        $data = '<select name="id_product_category" class="span4">';
        
        foreach($pcategory as $c) {
            if($product['id_product_category'] == $c['id']) {
                $selected = 'selected';    
            } else {
                $selected = '';
            }
            $data .= '<option value="'.$c['id'].'"' .$selected.'>'. ucfirst($c['name']).'</option>';
        }
        
        $data .= '</select>';
        
        return $data;
    }
    
    /**
     * Brand produk
     **/
    private function product_brand($id_product = '') {
        $product = $this->product->get_product($id_product);
        $brand = $this->brand->get_all_brand('all_records');
        
        $data = '<select name="id_product_brand" class="span4">'; 
        
        foreach($brand as $b) {
            if($product['id_product_brand'] == $b['id']) {
                $selected = 'selected';    
            } else {
                $selected = '';
            }
            
            $data .= '<option value="'.$b['id'].'" '.$selected.'>'. ucfirst($b['name']).'</option>';            
        }
        
        $data .= '</select>';
        
        return $data;
    }
    
    private function radio_config($name = '', $y = '' , $n = '') {
        return '<label>'.html_input('radio', array('name="'.$name.'"', 'value="Y"', $y)).'Ya</label>
                <label>'.html_input('radio', array('name="'.$name.'"', 'value="N"', $n)).'Tidak</label>';
    }
    
    /**
     * Konfigurasi produk
     **/
    private function product_conf($publish, $featured, $meta_desc = '', $meta_key = '') {
        return array(
            array('label' => 'Publish',             'input' => $publish),            
            array('label' => 'Produk featured',     'input' => $featured),
            array('label' => 'Gambar',              'input' => html_input('file', array('name="image"', 'class="span6"'))),
            array('label' => 'Meta Description',    'input' => html_textarea(array('name="meta_desc"', 'class="span6"'), $meta_desc)),
            array('label' => 'Meta Keyword',        'input' => html_textarea(array('name="meta_key"', 'class="span6"'), $meta_key))                        
        );
    }
    
    /**
     * Data produk
     **/
    private function product_data(  $id = '', $name = '', $brand = '', $category = '', 
                                    $price = '', $stock = '', $description = '') {
        return array(
            array('label' => 'ID : <b>'.$id.'</b>','input' => html_input('hidden', array('name="id"', 'value="'.$id.'"', 'class="span1"'))),
            array('label' => 'Nama Produk', 'input' => html_input('text', array('name="name"', 'value="'.$name.'"', 'id="name"', 'class="span6"'))),            
            array('label' => 'Kategori',    'input' => $category),
            array('label' => 'Brand',       'input' => $brand),            
            array('label' => 'Harga',       'input' => html_input('text', array('name="price"', 'value="'.$price.'"', 'class="span2"'))),
            array('label' => 'Persediaan',  'input' => html_input('text', array('name="stock"', 'value="'.$stock.'"', 'class="span1"'))), 
            array('label' => 'Keterangan',  'input' => html_textarea(array('name="description"', 'id="tinymce_editor"'), $description))            
        );
    }
    
    /**
     * Form data
     **/
    private function form_data($form_title, $product_data, $product_conf) {
        $tab_data = array(
            array(  'tab_active'        => 'active',   
                    'tab_link'          => 'product-data', 
                    'tab_title'         => 'Data Produk', 
                    'tab_data'          => $product_data),
                    
            array(  'tab_link'          => 'product-setting', 
                    'tab_title'         => 'Konfigurasi', 
                    'tab_data'          => $product_conf)
        );    
            
        $button = array(html_input('submit', array('value="Simpan"', 'class="btn btn-success"')));
        parent::form_config('yes', $tab_data, '', $form_title, $button);
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
            $query = $this->product->save_product($image);    
        } else if($mode == 'update') {
            $query = $this->product->update_product($id, $image);   
        }
            
        if($query) {                
            if(!empty($img_src)) {
                img_upload($img_src, $this->img_dir, $image, 'thumb');
            }
                
            parent::alert(  'success', 'Berhasil !', 'Data produk berhasil disimpan ! 
                            <a href='.$this->base_link.'>Klik disini</a> untuk kembali');
        } else {
            parent::alert('error', 'Gagal !', 'Data produk gagal disimpan !');
        }
    }
    
    /**
     * Membuat produk baru
     **/
    private function add_product() {
        if($_POST) {
            $this->saving('new');
        }
        
        $publish = $this->radio_config('publish', 'checked', '');        
        $featured = $this->radio_config('featured', 'checked', '');
        
        $product_data = $this->product_data('', '', $this->product_brand(), $this->product_category());
        
        $product_conf = $this->product_conf($publish, $featured);
        
        $this->form_data('Data produk baru', $product_data, $product_conf);
    }
    
    /**
     * Edit data produk
     **/
    private function edit_product() {
        $product = $this->product->get_product($_GET['id']);
        
        if($_POST) {
            $this->saving('update', $_GET['id'], $product['image']);
        }        
        
        $image = TEMP_PATH.'userfiles'.DS.'img'.DS.'thumb_'.$product['image'];
        $brand = $this->product_brand($_GET['id']);
        $category = $this->product_category($_GET['id']);
        
        $product_data = $this->product_data($product['id'], $product['name'], 
                                            $brand, $category, $product['price'], 
                                            $product['stock'], $product['description']);
                                            
        if($product['publish'] == 'Y') {            
            $publish = $this->radio_config('publish', 'checked', '');
        } else {            
            $publish = $this->radio_config('publish', '', 'checked');
        }
        
        if($product['featured'] == 'Y') {            
            $featured = $this->radio_config('featured', 'checked', '');
        } else {            
            $featured = $this->radio_config('featured', '', 'checked');
        }
                                            
        $product_conf = $this->product_conf($publish, $featured, $product['meta_desc'], $product['meta_key']);
        
        $this->form_data('Ubah data produk', $product_data, $product_conf);
    }
    
    public function view() {
        switch($_GET['act']) {
            case 'add' :
                $this->add_product();                
            break;
            
            case 'edit' :
                $this->edit_product();
            break;
            
            default:
                $this->product_list();                
            break;
        }      
    }
    
}

?>