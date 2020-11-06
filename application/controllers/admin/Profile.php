<?php

class Profile extends MY_admin_controller
{
  public function __construct() {
    parent::__construct();
  }
  public function index()
  {
    try {
      $data['_view'] = 'admin/profile/index';
      $data['_title'] = 'Admin Profile';
      $admin = $this->admin;
      $data['_admin'] = $admin;
      $method = $this->method();
      if($method == 'POST'){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('admin_nama','Nama Admin','required');
        $this->form_validation->set_rules('admin_password','Password Sekarang','required|callback_validate_password');
        $this->form_validation->set_rules('admin_password_baru','Password Baru','callback_validate_new_password');
        $this->form_validation->set_message('required', '{field} tidak boleh kosong');
        $this->form_validation->set_message('validate_password', '{field} tidak valid');
        $this->form_validation->set_message('validate_new_password', '{field} minimal 6 karakter');
        if($this->form_validation->run())     
        {
          $params = [
            'admin_nama' => htmlspecialchars(strtoupper($this->input->post('admin_nama'))),
          ];
          if(!empty($this->input->post('admin_password_baru'))){
            $params['admin_password'] = htmlspecialchars($this->input->post('admin_password_baru'));
          }
          $this->Admin->update_admin($admin['admin_id'],$params);
          $this->session->set_flashdata('success','nama admin '.$admin['admin_nama']." Berhasil diubah menjadi admin ".$params['admin_nama']);
          redirect('admin/profile');
        }
        else
        {
          $this->session->set_flashdata('error','Validasi Error');
          $this->load->view('admin/layout',$data);
        }
      }else{
        $this->load->view('admin/layout',$data);
      }
    } catch (Exception $th) {
      show_error($th->getMessage());
    }
  }
  function validate_password($str)
  {
    $field_value = $str; //this is redundant, but it's to show you how
    //the content of the fields gets automatically passed to the method
    if(password_verify($str,$this->admin['admin_password']))
    {
      return TRUE;
    }
    else
    {
      return FALSE;
    }
  }
  function validate_new_password($str)
  {
    $field_value = $str; //this is redundant, but it's to show you how
    //the content of the fields gets automatically passed to the method
    if(empty($str)){
      return true;
    }else{
      if(strlen($str) < 6){
        return false;
      }else{
       return true; 
      }
    }
  }
}