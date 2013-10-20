<?php if(!defined('Z_KEY')) exit('Access denied !');

/**
 * Z-COSP (ZAMBELZ - CMS Open Source Project)
 * @package module/user admin
 * @license Open Source
 * @author Nanda . J . A
 * @copyright 2013
 */

class User_admin extends Z_Controller {
    
    public function __construct() {
        parent::init('admin', 'user');        
        $this->load->model('user');
    }
    
    private function user_list() {
        $user = $this->user->get_all_user('all_records');
        $total_user = $this->user->get_all_user('total_data');
        
        $this->delete_user();
        
        $thead = array( '<th style="width:20px">ID</th>', 
                        '<th>Username</th>',
                        '<th>Status user</th>',
                        '<th>Status IM</th>', 
                        '<th>Tgl dibuat</th>',
                        '<th>Tgl diupdate</th>',
                        '<th>Terakhir login</th>');
        
        parent::table_config(   'user', 'daftar user',
                                'Tambah', 'Hapus',                                
                                $thead, $user, $total_user);
    }
    
    private function delete_user() {
        $check = $_POST['check'];
        $total_checked = count($check);
        
        if($total_checked > 0) {
            for($i=0; $i<$total_checked; $i++) {
                $this->user->delete_user($check[$i]);
            }
            
            redirect($this->base_link);    
        }
    }
    
    private function radio_config($name = '', $y = '' , $n = '') {
        return '<label>'.html_input('radio', array('name="'.$name.'"', 'value="Y"', $y)).'Ya</label>
                <label>'.html_input('radio', array('name="'.$name.'"', 'value="N"', $n)).'Tidak</label>';
    }
    
    private function im_choice() {
        return array('1' => 'Yahoo Messenger', 
                     '2' => 'Google Talk');
    }
    
    private function user_data( $username = '', $im = '', $im_id = '', 
                                $user_active = '', $im_active = '') {
        return array(            
            array('label' => 'Username',            'input' => html_input('text', array('name="username"', 'value="'.$username.'"', 'class="span3"'))),
            array('label' => 'Pilih IM',            'input' => html_select('im_type', ' Pilih IM ', $im)),
            array('label' => 'ID IM',               'input' => html_input('text', array('name="im_id"', 'value="'.$im_id.'"', 'class="span3"'))),
            array('label' => 'Aktifkan user',       'input' => $user_active),
            array('label' => 'Aktifkan IM',         'input' => $im_active),
            array('label' => 'Kata sandi',          'input' => html_input('password', array('name="password"', 'id="password"'))), 
            array('label' => 'Ulangi kata sandi',   'input' => html_input('password', array('name="re_password"', 'id="re_password"')))            
        );       
    }
    
    private function form_data($form_title, $form_data) {
        $button = array(html_input('submit', array('value="Simpan"', 'class="btn btn-success"')));
        parent::form_config('', '', $form_data, $form_title, $button);
    }
    
    private function saving($mode, $id = '') {
        if(!empty($_POST['username']) && !empty($_POST['password'])) {
            if($_POST['re_password'] == $_POST['password']) {
                if($mode == 'new') {
                    $query = $this->user->save_user();    
                } else if($mode == 'update') {
                    $query = $this->user->update_user($id);
                }                    
                    
                if($query) {
                    parent::alert('success', 'Berhasil !', 'Data user berhasil disimpan ! 
                                   <a href='.$this->base_link.'>Klik disini</a> untuk kembali');
                } else {
                    parent::alert('error', 'Gagal !', 'Data user gagal disimpan !');
                }    
            }
        }
    }
    
    private function add_user() {
        if($_POST) {
            $this->saving('new');                                     
        } 
        
        $user_active = $this->radio_config('user_active', '', 'checked');        
        $im_active = $this->radio_config('im_active', '', 'checked');        
        $user_data = $this->user_data('', $this->im_choice(), '', $user_active, $im_active);
        
        $this->form_data('Data user baru', $user_data);
    }
    
    private function edit_user($type = '') {
        if($type == 'my_profile') {
            $id_user = $_SESSION['id'];
            $title = 'Profil saya';
        } else {
            $id_user = $_GET['id'];
            $title = 'Ubah data user';
        }
        
        $user = $this->user->get_user($id_user);
        
        if($_POST) {
            $this->saving('update', $user['id']);                     
        }       
        
        if($user['user_active'] == 'Y') {
            $user_active = $this->radio_config('user_active', 'checked');   
        } else {
            $user_active = $this->radio_config('user_active', '', 'checked');
        }
        
        if($user['im_active'] == 'Y') {
            $im_active = $this->radio_config('im_active', 'checked');    
        } else {
            $im_active = $this->radio_config('im_active', '', 'checked'); 
        }
               
        $user_data = $this->user_data($user['username'], $this->im_choice(), '', $user_active, $im_active);
        
        $this->form_data($title, $user_data);
    }
    
    public function view() {
        switch($_GET['act']) {
            case 'add' :
                $this->add_user();                
            break;
            
            case 'edit' :
                $this->edit_user();
            break;
            
            case 'my_profile' :
                $this->edit_user('my_profile');
            break;
            
            default :
                $this->user_list();                
            break;
        }
    }
    
}

?>