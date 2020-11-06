<?php

class Auth extends CI_Controller
{
  public function __construct() {
    parent::__construct();
    $this->load->model('admin_model','Admin');
    $this->load->model('user_model','User');
  }
  public function index()
  {
    try {
      $data['_view'] = 'auth/index';
      $data['_title'] = 'Login';
      if(isset($_POST['login'])){
        $params = [
          'admin_username' => htmlspecialchars(strtolower($this->input->post('username'))),
          'admin_password' => htmlspecialchars($this->input->post('password')),
        ];
        $authAdmin = $this->Admin->authenticate($params);
        if($authAdmin){
          $authAdmin['isSuperAdmin'] = $authAdmin['role_id'] == 1;
          $this->session->set_userdata($authAdmin);
          redirect('admin/dashboard');
        }else{
          $paramsUser = [
            'user_nik'=> $params['admin_username'],
            'user_password'=> $params['admin_password'],
          ];
          $authUser = $this->User->authenticate($paramsUser);
          if($authUser){
            if((bool)$authUser['user_status']){
              $this->session->set_userdata($authUser);
              redirect('user/dashboard');
            }else{
              $this->session->set_flashdata('error','Akun ini masih belum aktif, harap kontak admin');
              redirect('auth');
            }
          }else{
            $this->session->set_flashdata('error','username atau password salah');
            redirect('auth');
          }
        }
      }else{
        $this->load->view('auth/layout',$data);
      }
    } catch (Exception $th) {
      show_error($th->getMessage());
    }
  }
  public function forgotpass()
  {
    try {
      $data['_view'] = 'auth/forgotpass';
      $data['_title'] = 'Lupa Kata Sandi';
      if(isset($_POST['kirim'])){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username','NIK / Username','required|callback_cek_username');
        $this->form_validation->set_rules('password','Password','required|min_length[6]');
        $this->form_validation->set_rules('password2','Konfirmasi Password','required|min_length[6]|matches[password]');
        $this->form_validation->set_message('required', '{field} tidak boleh kosong');
        $this->form_validation->set_message('cek_username', '{field} tidak ditemukan');
        $this->form_validation->set_message('min_length', '{field} harus lebih dari {param} karakter');
        $this->form_validation->set_message('matches', '{field} tidak sama dengan {param}');
        if($this->form_validation->run())     
        {

          $params = [
            'username' => htmlspecialchars($this->input->post('username')),
            'password' => htmlspecialchars($this->input->post('password')),
          ];
          $admin = $this->Admin->get_admin_by_username($params['username']);
          if($admin){
            $this->Admin->update_admin($admin['admin_id'],['admin_password' => $params['password']]);
          }else{
            $user = $this->User->get_user_by_nik($params['username']);
            $this->User->update_user($user['user_id'],['user_password' => $params['password']]);
          }
          $this->session->set_flashdata('success','Berhasil mengubah password');
          redirect('auth');
        }
        else
        {
          $this->session->set_flashdata('error','Validasi Error');
          $this->load->view('auth/layout',$data);
        }
      }else{
        $this->load->view('auth/layout',$data);
      }
    } catch (Exception $th) {
      show_error($th->getMessage());
    }
  }
  function cek_username($str)
  {
    $admin = $this->Admin->get_admin_by_username($str);
    if($admin){
      return true;
    }else{
      $user = $this->User->get_user_by_nik($str);
      if($user){
        return true;
      }else{
        return false;
      }
    }
  }
  function cek_jk($str)
  {
    if($str != "0"){
      return true;
    }else{
      return false;
    }
  }
  public function register()
  {
    try {
      $data['_view'] = 'auth/register';
      $data['_title'] = 'Daftar';
      if(isset($_POST['daftar'])){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nama','Nama','required');
        $this->form_validation->set_rules('nik','NIK','required|is_unique[user.user_nik]|min_length[16]|max_length[16]');
        $this->form_validation->set_rules('password','Password','required|min_length[6]');
        $this->form_validation->set_rules('tempat_lahir','Tempat Lahir','required');
        $this->form_validation->set_rules('tanggal_lahir','Tanggal Lahir','required');
        $this->form_validation->set_rules('jenis_kelamin','Jenis Kelamin','required|callback_cek_jk');
        $this->form_validation->set_rules('desa','Desa','required');
        $this->form_validation->set_rules('rt','RT','required');
        $this->form_validation->set_rules('rw','RW','required');
        $this->form_validation->set_rules('kecamatan','Kecamatan','required');
        $this->form_validation->set_rules('kabupaten','Kabupaten','required');
        $this->form_validation->set_rules('provinsi','Provinsi','required');
        $this->form_validation->set_message('required', '{field} tidak boleh kosong');
        $this->form_validation->set_message('cek_jk', 'harus pilih {field}');
        $this->form_validation->set_message('is_unique', '{field} sudah digunakan');
        $this->form_validation->set_message('min_length', '{field} harus lebih dari {param} karakter');
        $this->form_validation->set_message('max_length', '{field} harus kurang dari sama dengan {param} karakter');
        if($this->form_validation->run())     
        { 
          $params = [
            'user_nik' => htmlspecialchars($this->input->post('nik')),
            'user_nama' => htmlspecialchars(strtoupper($this->input->post('nama'))),
            'user_tempat_lahir' => htmlspecialchars(strtoupper($this->input->post('tempat_lahir'))),
            'user_tanggal_lahir' => htmlspecialchars($this->input->post('tanggal_lahir')),
            'user_jk' => htmlspecialchars(strtoupper($this->input->post('jenis_kelamin'))),
            'desa' => htmlspecialchars(strtoupper($this->input->post('desa'))),
            'rt' => htmlspecialchars($this->input->post('rt')),
            'rw' => htmlspecialchars($this->input->post('rw')),
            'kecamatan' => htmlspecialchars(strtoupper($this->input->post('kecamatan'))),
            'kabupaten' => htmlspecialchars(strtoupper($this->input->post('kabupaten'))),
            'provinsi' => htmlspecialchars(strtoupper($this->input->post('provinsi'))),
            'user_telepon' => htmlspecialchars($this->input->post('no_telp')),
            'user_password' => htmlspecialchars($this->input->post('password')),
          ];
          $this->User->add_user($params);
          $this->session->set_flashdata('success','Berhasil mendaftar');
          redirect('auth');
        }
        else
        {
          $this->session->set_flashdata('error','Validasi Error');
          $this->load->view('auth/layout',$data);
        }
      }else{
        $this->load->view('auth/layout',$data);
      }
    } catch (Exception $th) {
      show_error($th->getMessage());
    }
  }
  public function logout()
  {
    $this->session->sess_destroy();
    redirect('auth');
  }
}