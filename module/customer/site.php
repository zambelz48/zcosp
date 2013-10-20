<?php if(!defined('Z_KEY')) exit('Access denied !');

/**
 * Z-COSP (ZAMBELZ - CMS Open Source Project)
 * @package module/customer site
 * @license Open Source
 * @author Nanda . J . A
 * @copyright 2013
 */

class Customer_site extends Z_Controller {
    
    public function __construct() {
        parent::init('site');
        $this->load->model('customer');
        $this->load->model('order');
    }
    
    public function dashboard() {
        $this->customer_data();
        $this->customer_wishlist();
        parent::fetch('dashboard', 'module/customer');
    }
    
    private function register_result($result) {
        if($result == 'success') {
            $this->view->assign('result_header', 'Berhasil');
            $this->view->assign('result_message', 'Selamat, data anda telah terdaftar, untuk melanjutkan ke tahap berikutnya, silahkan akses akun email anda
            karena kami telah mengirimkan kode konfirmasi keanggotaan !
            Terima Kasih...');    
        } else if($result == 'failed') {
            $this->view->assign('result_header', 'Gagal');
            $this->view->assign('result_message', 'Gagal menyimpan data pelanggan'); 
        }        
        
        parent::fetch('register_result', 'module/customer');
    }
    
    public function register() {
        if($_POST) {
            if(!empty($_POST['fullname']) && !empty($_POST['email']) && !empty($_POST['state']) && 
               !empty($_POST['city']) && !empty($_POST['postal_code']) && !empty($_POST['username']) && 
               !empty($_POST['password']) && !empty($_POST['re_password'])) {
                
                if($_POST['password'] == $_POST['re_password']) {                    
                    $save_customer = $this->customer->save_customer();
                    $id_customer = $this->customer->get_last_id_customer();
                    if($save_customer) {                        
                        $save_customer_detail = $this->customer->save_customer_detail($id_customer);
                        if($save_customer_detail) {
                            redirect('index.php?page=customer&act=register-success');
                        } else {
                            //error dalam menyimpan data customer detail
                            //hapus data customer yang sudah di save
                            $this->customer->delete_customer($id_customer);
                            redirect('index.php?page=customer&act=register-failed');    
                        }    
                    } else {
                        //error dalam menyimpan data customer
                        redirect('index.php?page=customer&act=register-failed');
                    }
                } else {
                    //error karena password dan re_password tidak sama
                    redirect('index.php?page=customer&act=register-failed');
                }
            } else {
                //system error
                redirect('index.php?page=customer&act=register-failed');
            }
        }
        
        parent::fetch('register', 'module/customer');
    }
    
    public function customer_data($disabled = '') {
        $id = $_SESSION['id'];
        $customer = $this->customer->get_customer('', $id);
        $detail = $this->customer->get_customer('detail', $id);
        
        if($detail['sex'] == 'Pria') {
            $customer_sex = '   <input type="radio" name="gender" value="pria" checked '.$disabled.' /> Pria
                                <input type="radio" name="gender" value="wanita" '.$disabled.' /> Wanita';
        } else {
            $customer_sex = '   <input type="radio" name="gender" value="pria" '.$disabled.' /> Pria
                                <input type="radio" name="gender" value="wanita" checked '.$disabled.' /> Wanita';
        }
        
        $this->view->assign('customer_fullname',    $detail['fullname']);
        $this->view->assign('customer_sex',         $customer_sex);
        $this->view->assign('customer_email',       $detail['email']);
        $this->view->assign('customer_phone',       $detail['phone_number']);
        $this->view->assign('customer_address',     $detail['address']);
        $this->view->assign('customer_state',       $detail['state']);
        $this->view->assign('customer_city',        $detail['city']);
        $this->view->assign('customer_postal_code', $detail['postal_code']);
    }
    
    public function customer_wishlist() {
        $wishlist = $this->customer->view_wishlist('all_records');
        $total_data = $this->customer->view_wishlist('total_data');
        
        $this->view->assign('customer_wishlist',    $wishlist);
        $this->view->assign('total_wishlist',       $total_data);
    }
    
    public function checkout() {  
        $this->customer_data('disabled');
        
        $this->view->assign('bought_data', $this->order->view_cart());
        $this->view->assign('total_buy', $this->order->view_cart('totalbuy'));
        
        parent::fetch('checkout', 'module/customer');
    }
    
    public function header_config() {
        switch($_GET['act']) {
            case 'login' :
                $title = '- login';
            break;
            
            case 'register' :
                $title = '- register';
            break;
            
            case 'cart' :
                $title = '- cart';
            break;
            
            case 'checkout' :
                $title = '- checkout';
            break;
            
            default :
            break;
        }
        
        parent::site_head_config(   'customer '.$title, 
                                    'meta keyword for customer '.$title, 
                                    'meta description for customer '.$title);        
    }
    
    public function view() {
        switch($_GET['act']) {
            case 'login' :
                if(empty($_SESSION['user_type']) || $_SESSION['user_type'] != 'customer'){
                    load_class(MODULE_PATH.'login'.DS, 'site', 'login_site');                    
                } else {
                    $this->dashboard();
                }
            break;
            
            case 'register' :
                $this->register();
            break;
            
            case 'register-success' :
                $this->register_result('success');
            break;
            
            case 'register-failed' :
                $this->register_result('failed');
            break;
            
            case 'add-to-wishlist' :
            break;
            
            case 'remove-wishlist' :
            break;
            
            case 'checkout' :
                if(empty($_SESSION['user_type']) || $_SESSION['user_type'] != 'customer'){
                    load_class(MODULE_PATH.'login'.DS, 'site', 'login_site');                    
                } else {
                    $this->checkout();
                }
            break;
            
            case 'logout' :
                session_destroy();
                $_SESSION = array();
                redirect('customer-login.html');
            break;
            
            default :
                if(empty($_SESSION['user_type']) || $_SESSION['user_type'] != 'customer'){
                    load_class(MODULE_PATH.'login'.DS, 'site', 'login_site');                    
                } else {
                    $this->dashboard();
                }
            break;
        }
    }
}

?>