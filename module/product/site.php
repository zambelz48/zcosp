<?php if(!defined('Z_KEY')) exit('Access denied !');

/**
 * Z-COSP (ZAMBELZ - CMS Open Source Project)
 * @package module/product site
 * @license Open Source
 * @author Nanda . J . A
 * @copyright 2013
 */


class Product_site extends Z_Controller {
    
    private $img_dir;
    
    public function __construct() {
        parent::init('site');
        $this->img_dir = SITE_IMG_SRC.'product/';        
        $this->load->model('customer');
        $this->load->model('product');
        $this->load->model('product_brand', 'brand');
    }
    
    public function product_list() {
        $product = $this->product->get_all_product('', 'published', 'all_records');
        $total_product = $this->product->get_all_product('', 'published', 'total_data');
        
        $this->view->assign('product_header', 'Semua produk');
        $this->view->assign('total_product', $total_product);
        $this->view->assign('product_list', $product);
        
        parent::fetch('product/product_list', 'module');
    }
    
    public function product_detail() {
        $product = $this->product->get_product($_GET['id']);
        $product_related = $this->product->get_all_product('related', 'published', 'all_records', $product['id_product_category']);
        $total_product_related = $this->product->get_all_product('related', 'published', 'total_data', $product['id_product_category']);
        $brand = $this->brand->get_brand($product['id']);
        
        if(isset($_SESSION['user_type']) && isset($_SESSION[''])) {
            $user_name = '';
        } else {
            $user_name = '';
        }
        
        if($product['status'] == 0) {
            $status = 'Belum Tersedia';
        } else {
            $status = 'Tersedia';
        }       
        
        $this->view->assign('captcha_src', SITE_CAPTCHA_SRC);
        
        $this->view->assign('product_brand',        $brand['name']);
        $this->view->assign('product_status',       $status);
        $this->view->assign('product_name',         $product['name']);
        $this->view->assign('product_price',        format_rupiah($product['price']));
        $this->view->assign('product_description',  $product['description']);
        $this->view->assign('product_img_thumb',    $this->img_dir.'thumb_'.$product['image']);
        $this->view->assign('product_img',          $this->img_dir.$product['image']);
        
        $this->view->assign('total_product_related', $total_product_related);
        $this->view->assign('product_related', $product_related);
        
        parent::fetch('product/product_detail', 'module');
    }
    
    public function header_config() {        
        switch($_GET['act']) {
            case 'detail' :
                $product = $this->product->get_product($_GET['id']);
                $title = $product['name'];
                $meta_key = $product['meta_key'];
                $meta_desc = $product['meta_desc'];
            break;
            
            default :
                $title = 'semua produk';
                $meta_key = 'meta keyword for semua produk';
                $meta_desc = 'meta description for semua produk';
            break;
        }
        
        parent::site_head_config($title, $meta_key, $meta_desc);
    }
    
    public function view() {
        $this->view->assign('product_img_src', $this->img_dir);
        
        switch($_GET['act']) {
            case 'detail' :
                $this->product_detail();
            break;
            
            default :
                $this->product_list();
            break;
        }
    }
    
}

?>