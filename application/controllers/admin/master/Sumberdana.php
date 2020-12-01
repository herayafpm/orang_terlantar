<?php
class Sumberdana extends MY_admin_controller
{
  public function __construct()
  {
    parent::__construct();
    $this->isNotSuperAdmin();
    $this->load->model('sumber_dana_model', 'SumberDana');
  }

  public function index()
  {
    $data['_view'] = 'admin/master/sumber_dana/index';
    $data['_title'] = 'Sumber Dana';
    $data['_datatable'] = true;
    $data['_datatable_view'] = 'admin/master/sumber_dana/datatables';
    $data = array_merge($data, $this->data);
    $this->load->view('admin/template', $data);
  }
  public function datatables()
  {
    try {
      $method = $_SERVER['REQUEST_METHOD'];
      if ($method == 'POST') {
        $this->datatable_data($this->SumberDana);
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
      $data['_view'] = 'admin/master/sumber_dana/add';
      $data['_title'] = 'Tambah Sumber Dana ';
      $data = array_merge($data, $this->data);
      if (isset($_POST['simpan'])) {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('sumber_dana_nama', 'Nama Sumber Dana', 'required');
        $this->form_validation->set_message('required', '{field} tidak boleh kosong');
        if ($this->form_validation->run()) {
          $params = [
            'sumber_dana_nama' => htmlspecialchars($this->input->post('sumber_dana_nama')),
          ];
          $this->SumberDana->add_sumber_dana($params);
          $this->session->set_flashdata('success', "Berhasil menambah Sumber Dana " . $params['sumber_dana_nama']);
          redirect('admin/master/sumberdana/index');
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
      $sumber_dana = $this->SumberDana->get_sumber_dana($id);
      $data['_view'] = 'admin/master/sumber_dana/edit';
      $data['_title'] = 'Edit Sumber Dana ' . $sumber_dana['sumber_dana_nama'];
      $data['_sumber_dana'] = $sumber_dana;
      $data = array_merge($data, $this->data);
      if (isset($_POST['simpan'])) {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('sumber_dana_nama', 'Nama Sumber Dana', 'required');
        $this->form_validation->set_message('required', '{field} tidak boleh kosong');
        if ($this->form_validation->run()) {
          $params = [
            'sumber_dana_nama' => htmlspecialchars($this->input->post('sumber_dana_nama')),
          ];
          $this->SumberDana->update_sumber_dana($id, $params);
          $this->session->set_flashdata('success', 'Sumber Dana ' . $sumber_dana['sumber_dana_nama'] . " Berhasil diubah menjadi Sumber Dana " . $params['sumber_dana_nama']);
          redirect('admin/master/sumberdana/index');
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
  public function delete($id)
  {
    try {
      $method = $_SERVER['REQUEST_METHOD'];
      if ($method == 'POST') {
        $sumber_dana = $this->SumberDana->get_sumber_dana($id);
        $this->load->model('terlantar_model', 'Terlantar');
        if ($this->Terlantar->is_using('sumber_dana_id', $id)) {
          $this->session->set_flashdata('error', 'Sumber Dana ' . $sumber_dana['sumber_dana_nama'] . " masih digunakan, tidak bisa dihapus");
          redirect('admin/master/sumberdana/index');
        }
        $this->load->model('bansos_model', 'Bansos');
        if ($this->Bansos->is_using('sumber_dana_id', $id)) {
          $this->session->set_flashdata('error', 'Sumber Dana ' . $sumber_dana['sumber_dana_nama'] . " masih digunakan, tidak bisa dihapus");
          redirect('admin/master/sumberdana/index');
        }
        if ($sumber_dana) {
          $delete = $this->SumberDana->delete_sumber_dana($id);
          if ($delete) {
            $this->session->set_flashdata('success', 'Sumber Dana ' . $sumber_dana['sumber_dana_nama'] . " berhasil dihapus");
          } else {
            $this->session->set_flashdata('error', 'Sumber Dana ' . $sumber_dana['sumber_dana_nama'] . " gagal dihapus");
          }
          redirect('admin/master/sumberdana/index');
        } else {
          throw new Exception('Sumber Dana tidak ditemukan');
        }
      } else {
        throw new Exception('Halaman tidak ditemukan');
      }
    } catch (Exception $th) {
      show_error($th->getMessage());
    }
  }
}
