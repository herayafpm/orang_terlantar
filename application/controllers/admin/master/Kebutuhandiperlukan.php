<?php
class Kebutuhandiperlukan extends MY_admin_controller
{
  public function __construct()
  {
    parent::__construct();
    $this->isNotSuperAdmin();
    $this->load->model('kebutuhan_diperlukan_model', 'KebutuhanDiperlukan');
  }

  public function index()
  {
    $data['_view'] = 'admin/master/kebutuhan_diperlukan/index';
    $data['_title'] = 'Kebutuhan Yang Diperlukan';
    $data['_datatable'] = true;
    $data['_datatable_view'] = 'admin/master/kebutuhan_diperlukan/datatables';
    $data = array_merge($data, $this->data);
    $this->load->view('admin/template', $data);
  }
  public function datatables()
  {
    try {
      $method = $_SERVER['REQUEST_METHOD'];
      if ($method == 'POST') {
        $this->datatable_data($this->KebutuhanDiperlukan);
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
      $data['_view'] = 'admin/master/kebutuhan_diperlukan/add';
      $data['_title'] = 'Tambah Kebutuhan Yang Diperlukan ';
      $data = array_merge($data, $this->data);
      if (isset($_POST['simpan'])) {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('kebutuhan_diperlukan_nama', 'Nama Kebutuhan Yang Diperlukan', 'required');
        $this->form_validation->set_message('required', '{field} tidak boleh kosong');
        if ($this->form_validation->run()) {
          $params = [
            'kebutuhan_diperlukan_nama' => htmlspecialchars($this->input->post('kebutuhan_diperlukan_nama')),
          ];
          $this->KebutuhanDiperlukan->add_kebutuhan_diperlukan($params);
          $this->session->set_flashdata('success', "Berhasil menambah Kebutuhan Yang Diperlukan " . $params['kebutuhan_diperlukan_nama']);
          redirect('admin/master/kebutuhandiperlukan/index');
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
      $kebutuhan_diperlukan = $this->KebutuhanDiperlukan->get_kebutuhan_diperlukan($id);
      $data['_view'] = 'admin/master/kebutuhan_diperlukan/edit';
      $data['_title'] = 'Edit Kebutuhan Yang Diperlukan ' . $kebutuhan_diperlukan['kebutuhan_diperlukan_nama'];
      $data['_kebutuhan_diperlukan'] = $kebutuhan_diperlukan;
      $data = array_merge($data, $this->data);
      if (isset($_POST['simpan'])) {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('kebutuhan_diperlukan_nama', 'Nama Kebutuhan Yang Diperlukan', 'required');
        $this->form_validation->set_message('required', '{field} tidak boleh kosong');
        if ($this->form_validation->run()) {
          $params = [
            'kebutuhan_diperlukan_nama' => htmlspecialchars($this->input->post('kebutuhan_diperlukan_nama')),
          ];
          $this->KebutuhanDiperlukan->update_kebutuhan_diperlukan($id, $params);
          $this->session->set_flashdata('success', 'Kebutuhan Yang Diperlukan ' . $kebutuhan_diperlukan['kebutuhan_diperlukan_nama'] . " Berhasil diubah menjadi Kebutuhan Yang Diperlukan " . $params['kebutuhan_diperlukan_nama']);
          redirect('admin/master/kebutuhandiperlukan/index');
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
        $kebutuhan_diperlukan = $this->KebutuhanDiperlukan->get_kebutuhan_diperlukan($id);
        $this->load->model('terlantar_model', 'Terlantar');
        if ($this->Terlantar->is_using('kebutuhan_diperlukan_id', $id)) {
          $this->session->set_flashdata('error', 'Kebutuhan Diperlukan ' . $kebutuhan_diperlukan['kebutuhan_diperlukan_nama'] . " masih digunakan, tidak bisa dihapus");
          redirect('admin/master/kebutuhandiperlukan/index');
        }
        if ($kebutuhan_diperlukan) {
          $delete = $this->KebutuhanDiperlukan->delete_kebutuhan_diperlukan($id);
          if ($delete) {
            $this->session->set_flashdata('success', 'Kebutuhan Yang Diperlukan ' . $kebutuhan_diperlukan['kebutuhan_diperlukan_nama'] . " berhasil dihapus");
          } else {
            $this->session->set_flashdata('error', 'Kebutuhan Yang Diperlukan ' . $kebutuhan_diperlukan['kebutuhan_diperlukan_nama'] . " gagal dihapus");
          }
          redirect('admin/master/kebutuhandiperlukan/index');
        } else {
          throw new Exception('Kebutuhan Yang Diperlukan tidak ditemukan');
        }
      } else {
        throw new Exception('Halaman tidak ditemukan');
      }
    } catch (Exception $th) {
      show_error($th->getMessage());
    }
  }
}
