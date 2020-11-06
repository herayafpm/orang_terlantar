<?php

class Admin extends MY_admin_controller
{
  public function __construct() {
    parent::__construct();
    $this->isNotSuperAdmin();
    $this->load->model('admin_model','Admin');
  }
  public function index()
  {
    $data['_view'] = 'admin/admin/index';
    $data['_title'] = 'Data Admin';
    $data['_datatable'] = true;
    $data['_datatable_view'] = 'admin/admin/datatables';
    $this->load->view('admin/layout',$data);
  }
  public function datatables()
  {
    try {
      $method = $_SERVER['REQUEST_METHOD'];
      if($method == 'POST'){
        $this->datatable_data($this->Admin,$this->admin['admin_id']);
      }else{
        throw new Exception("Halaman tidak ditemukkan");
      }
    } catch (Exception $th) {
      show_error($th->getMessage());
    }
  }
  public function add()
  {
    try {
      $data['_view'] = 'admin/admin/add';
      $data['_title'] = 'Tambah Admin';
      $method = $_SERVER['REQUEST_METHOD'];
      if($method == 'POST'){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('admin_nama','Nama Admin','required');
        $this->form_validation->set_rules('admin_username','Username Admin','required|is_unique[admin.admin_username]');
        $this->form_validation->set_message('required', '{field} tidak boleh kosong');
        $this->form_validation->set_message('is_unique', '{field} sudah digunakan');
        if($this->form_validation->run())     
        { 
          $params = [
            'admin_nama' => htmlspecialchars(strtoupper($this->input->post('admin_nama'))),
            'admin_username' => htmlspecialchars(strtolower($this->input->post('admin_username'))),
            'role_id' => htmlspecialchars($this->input->post('role_id')?$this->input->post('role_id'):2),
          ];
          $this->Admin->add_admin($params);
          $this->session->set_flashdata('success','Berhasil menambahkan admin');
          redirect('admin/admin');
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
  public function delete($id)
  {
    try {
      $method = $_SERVER['REQUEST_METHOD'];
      if($method == 'POST'){
        $admin = $this->Admin->get_admin($id);
        if($admin){
          $delete = $this->Admin->delete_admin($id);
          if($delete){
            $this->session->set_flashdata('success','admin '.$admin['admin_nama']." berhasil dihapus");
          }else{
            $this->session->set_flashdata('error','admin '.$admin['admin_nama']." gagal dihapus");
          }
          redirect('admin/admin');
        }else{
          throw new Exception('admin tidak ditemukan');
        }
      }else{
        throw new Exception('Halaman tidak ditemukan');
      }
    } catch (Exception $th) {
      show_error($th->getMessage());
    }
  }
}