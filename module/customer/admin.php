<?php if(!defined('Z_KEY')) exit('Access denied !');

/**
 * Z-COSP (ZAMBELZ - CMS Open Source Project)
 * @package module/customer admin
 * @license Open Source
 * @author Nanda . J . A
 * @copyright 2013
 */

class Customer_admin extends Z_Controller {
    
    private $img_dir;
    
    public function __construct() {
        parent::init('admin', 'customer');
        $this->img_dir = '../files/images/customer/profile_picture/';
        $this->load->model('customer');
    }
    
    private function customer_list() {
        $customer = $this->customer->get_all_customer('all_records');
        $total_customer = $this->customer->get_all_customer('total_data');
        
        $this->delete_customer();
        
        $thead = array( '<th>Username</th>', 
                        '<th>Tgl registrasi</th>');
        
        parent::table_config(   'customer', 'daftar pelanggan', 
                                '', 'Hapus',
                                $thead, $customer, $total_customer);
    }
    
    private function delete_customer() {
        $check = $_POST['check'];
        $total_checked = count($check);
        
        if($total_checked > 0) {
            for($i=0; $i<$total_checked; $i++) {
                $this->customer->delete_customer($check[$i]);                
            }
            
            redirect($this->base_link);    
        }
    }
    
    private function radio_config($name = '', $y = '' , $n = '') {
        return '<label>'.html_input('radio', array('name="'.$name.'"', 'value="N"', $y)).'Aktif</label>
                <label>'.html_input('radio', array('name="'.$name.'"', 'value="Y"', $n)).'Non-aktif</label>';
    }
    
    private function view_customer() {
        $id = $_GET['id'];
        
        if($_POST) {
            $update = $this->customer->update_blocked_status_customer($id);
            
            if($update) {
                redirect($this->base_link);
            } else {
                parent::alert('error', 'Gagal !', 'Gagal merubah status pelanggan !');
            }
        }
        
        $customer = $this->customer->get_customer('', $id);
        $detail = $this->customer->get_customer('detail', $id);
        
        if($customer['blocked'] == 'N') {
            $status = $this->radio_config('blocked', 'checked', '');
        } else {
            $status = $this->radio_config('blocked', '', 'checked');
        }
        
        $customer_data = array(
            array('label' => '<img src="'.$this->img_dir.'no_image.jpg" />',      'input' => ''),
            array('label' => 'Tgl registrasi',      'input' => html_input('text', array('value="'.$customer['reg_date'].'"', 'class="span3"', 'disabled'))),
            array('label' => 'Nama lengkap',        'input' => html_input('text', array('value="'.$detail['fullname'].'"', 'class="span3"', 'disabled'))),            
            array('label' => 'Status',              'input' => $status),
            array('label' => 'Jenis kelamin',       'input' => html_input('text', array('value="'.$detail['sex'].'"', 'class="span3"', 'disabled'))),
            array('label' => 'Alamat',              'input' => html_textarea(array('class="span6"', 'disabled'), $detail['address'])),            
            array('label' => 'Provinsi',            'input' => html_input('text', array('value="'.$detail['state'].'"', 'class="span3"', 'disabled'))),
            array('label' => 'Kota',                'input' => html_input('text', array('value="'.$detail['city'].'"', 'class="span3"', 'disabled'))), 
            array('label' => 'Kode pos',            'input' => html_input('text', array('value="'.$detail['postal_code'].'"', 'class="span3"', 'disabled'))),
            array('label' => 'No.Telp',             'input' => html_input('text', array('value="'.$detail['phone_number'].'"', 'class="span3"', 'disabled'))),
            array('label' => 'Email',               'input' => html_input('text', array('value="'.$detail['email'].'"', 'class="span3"', 'disabled')))            
        );
        
        $button = array(html_input('submit', array('value="Simpan"', 'class="btn btn-success"')), 
                        html_input('button', array('value="Kirim Pesan"', 'onClick="window.location.go(-1)"', 'class="btn btn-success"')));
        parent::form_config('', '', $customer_data, 'Data pelanggan', $button);        
    }
    
    public function view() {
        switch($_GET['act']) {
            case 'edit' :
                $this->view_customer();
            break;
            
            default :                
                $this->customer_list();                
            break;
        }        
    }
    
}

?>