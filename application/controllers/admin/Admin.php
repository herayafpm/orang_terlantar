<?php

class Admin extends MY_admin_controller
{
  public function __construct()
  {
    parent::__construct();
    $this->isNotSuperAdmin();
    $this->load->model('admin_model', 'Admin');
  }
  public function index()
  {
    $data['_view'] = 'admin/admin/index';
    $data['_title'] = 'Data Admin';
    $data['_datatable'] = true;
    $data['_datatable_view'] = 'admin/admin/datatables';
    $data = array_merge($data, $this->data);
    $this->load->view('admin/template', $data);
  }
  public function log($id)
  {
    try {
      $admin = $this->Admin->get_admin($id);
      if (!$admin) {
        throw new Exception("Admin tidak ditemukkan");
      }
      $data['_view'] = 'admin/admin/log';
      $data['_title'] = 'Catatan Login ' . $admin['admin_nama'];
      $data['_admin'] = $admin;
      $data['_datatable'] = true;
      $data['_datatable_view'] = 'admin/admin/log_datatables';
      $data = array_merge($data, $this->data);
      $this->load->view('admin/template', $data);
    } catch (Exception $th) {
      $this->session->set_flashdata('error', $th->getMessage());
      redirect('admin/admin');
    }
  }
  public function logdatatables($id = NULL)
  {
    try {
      $method = $_SERVER['REQUEST_METHOD'];
      if ($method == 'POST') {
        $this->load->model('login_admin_model', 'LoginAdmin');
        $this->datatable_log($this->LoginAdmin, ['admin_id' => $id]);
      } else {
        throw new Exception("Halaman tidak ditemukkan");
      }
    } catch (Exception $th) {
      show_error($th->getMessage());
    }
  }
  public function datatables()
  {
    try {
      $method = $_SERVER['REQUEST_METHOD'];
      if ($method == 'POST') {
        $this->datatable_data($this->Admin, $this->admin['admin_id']);
      } else {
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
      $data = array_merge($data, $this->data);
      $method = $_SERVER['REQUEST_METHOD'];
      if ($method == 'POST') {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('admin_nama', 'Nama Admin', 'required');
        $this->form_validation->set_rules('admin_username', 'Username Admin', 'required|is_unique[admin.admin_username]');
        $this->form_validation->set_message('required', '{field} tidak boleh kosong');
        $this->form_validation->set_message('is_unique', '{field} sudah digunakan');
        if ($this->form_validation->run()) {
          $params = [
            'admin_nama' => htmlspecialchars(strtoupper($this->input->post('admin_nama'))),
            'admin_username' => htmlspecialchars(strtolower($this->input->post('admin_username'))),
          ];
          $this->Admin->add_admin($params);
          $this->session->set_flashdata('success', 'Berhasil menambahkan admin');
          redirect('admin/admin');
        } else {
          $this->session->set_flashdata('error', 'Validasi Error');
          $this->load->view('admin/template', $data);
        }
      } else {
        $this->load->view('admin/template', $data);
      }
    } catch (Exception $th) {
      show_error($th->getMessage());
    }
  }
  public function edit($id)
  {
    try {
      $admin = $this->Admin->get_admin($id);
      if (!$admin) {
        throw new Exception("Admin tidak ditemukkan");
      }
      $data['_view'] = 'admin/admin/edit';
      $data['_title'] = 'Edit Admin';
      $data['_admin'] = $admin;
      $data = array_merge($data, $this->data);
      $method = $_SERVER['REQUEST_METHOD'];
      if ($method == 'POST') {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('admin_nama', 'Nama Admin', 'required');
        $this->form_validation->set_rules('admin_username', 'Username Admin', 'required|callback_is_unique_edit[' . $admin['admin_username'] . ']');
        $this->form_validation->set_rules('admin_password', 'Password Admin', 'callback_validate_new_password');
        $this->form_validation->set_message('required', '{field} tidak boleh kosong');
        $this->form_validation->set_message('is_unique_edit', '{field} sudah digunakan');
        $this->form_validation->set_message('validate_new_password', '{field} minimal 6 karakter');
        if ($this->form_validation->run()) {
          $params = [
            'admin_nama' => htmlspecialchars(strtoupper($this->input->post('admin_nama'))),
            'admin_username' => htmlspecialchars(strtolower($this->input->post('admin_username'))),
          ];
          if (!empty($this->input->post('admin_password'))) {
            $params['admin_password'] = htmlspecialchars($this->input->post('admin_password'));
          }
          $this->Admin->update_admin($id, $params);
          $this->session->set_flashdata('success', 'Berhasil mengubah admin');
          redirect('admin/admin');
        } else {
          $this->session->set_flashdata('error', 'Validasi Error');
          $this->load->view('admin/template', $data);
        }
      } else {
        $this->load->view('admin/template', $data);
      }
    } catch (Exception $th) {
      $this->session->set_flashdata('error', $th->getMessage());
      redirect('admin/admin');
    }
  }
  function validate_new_password($str)
  {
    $field_value = $str; //this is redundant, but it's to show you how
    //the content of the fields gets automatically passed to the method
    if (empty($str)) {
      return true;
    } else {
      if (strlen($str) < 6) {
        return false;
      } else {
        return true;
      }
    }
  }
  function is_unique_edit($str, $username)
  {
    if ($str == $username) {
      return true;
    } else {
      $admin = $this->Admin->get_admin_by_username($str);
      if ($admin) {
        if ($admin['admin_username'] == $username) {
          return true;
        }
      } else {
        return true;
      }
    }
    return false;
  }
  public function delete($id)
  {
    try {
      $method = $_SERVER['REQUEST_METHOD'];
      if ($method == 'POST') {
        $admin = $this->Admin->get_admin($id);
        $this->load->model('terlantar_model', 'Terlantar');
        if ($this->Terlantar->is_using('terlantar_proses.proses_by', $id)) {
          $this->session->set_flashdata('error', 'Admin ' . $admin['admin_nama'] . " masih digunakan, tidak bisa dihapus");
          redirect('admin/admin/index');
        }
        if ($this->Terlantar->is_using('terlantar_verif.verif_by', $id)) {
          $this->session->set_flashdata('error', 'Admin ' . $admin['admin_nama'] . " masih digunakan, tidak bisa dihapus");
          redirect('admin/admin/index');
        }
        if ($this->Terlantar->is_using('terlantar_tolak.tolak_by', $id)) {
          $this->session->set_flashdata('error', 'Admin ' . $admin['admin_nama'] . " masih digunakan, tidak bisa dihapus");
          redirect('admin/admin/index');
        }
        $this->load->model('user_model', 'User');
        if ($this->User->is_using('verif_by', $id)) {
          $this->session->set_flashdata('error', 'Admin ' . $admin['admin_nama'] . " masih digunakan, tidak bisa dihapus");
          redirect('admin/admin/index');
        }
        if ($admin) {
          $delete = $this->Admin->delete_admin($id);
          if ($delete) {
            $this->session->set_flashdata('success', 'admin ' . $admin['admin_nama'] . " berhasil dihapus");
          } else {
            $this->session->set_flashdata('error', 'admin ' . $admin['admin_nama'] . " gagal dihapus");
          }
          redirect('admin/admin');
        } else {
          throw new Exception('admin tidak ditemukan');
        }
      } else {
        throw new Exception('Halaman tidak ditemukan');
      }
    } catch (Exception $th) {
      show_error($th->getMessage());
    }
  }
}
