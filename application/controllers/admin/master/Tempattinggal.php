<?php
class Tempattinggal extends MY_admin_controller
{
  public function __construct()
  {
    parent::__construct();
    $this->isNotSuperAdmin();
    $this->load->model('tempat_tinggal_model', 'TempatTinggal');
  }

  public function index()
  {
    $data['_view'] = 'admin/master/tempat_tinggal/index';
    $data['_title'] = 'Tempat Tinggal';
    $data['_datatable'] = true;
    $data['_datatable_view'] = 'admin/master/tempat_tinggal/datatables';
    $data = array_merge($data, $this->data);
    $this->load->view('admin/template', $data);
  }
  public function datatables()
  {
    try {
      $method = $_SERVER['REQUEST_METHOD'];
      if ($method == 'POST') {
        $this->datatable_data($this->TempatTinggal);
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
      $data['_view'] = 'admin/master/tempat_tinggal/add';
      $data['_title'] = 'Tambah Tempat Tinggal ';
      $data = array_merge($data, $this->data);
      if (isset($_POST['simpan'])) {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('tempat_tinggal_nama', 'Nama Tempat Tinggal', 'required');
        $this->form_validation->set_message('required', '{field} tidak boleh kosong');
        if ($this->form_validation->run()) {
          $params = [
            'tempat_tinggal_nama' => htmlspecialchars($this->input->post('tempat_tinggal_nama')),
          ];
          $this->TempatTinggal->add_tempat_tinggal($params);
          $this->session->set_flashdata('success', "Berhasil menambah Tempat Tinggal " . $params['tempat_tinggal_nama']);
          redirect('admin/master/tempattinggal/index');
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
      $tempat_tinggal = $this->TempatTinggal->get_tempat_tinggal($id);
      $data['_view'] = 'admin/master/tempat_tinggal/edit';
      $data['_title'] = 'Edit Tempat Tinggal ' . $tempat_tinggal['tempat_tinggal_nama'];
      $data['_tempat_tinggal'] = $tempat_tinggal;
      $data = array_merge($data, $this->data);
      if (isset($_POST['simpan'])) {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('tempat_tinggal_nama', 'Nama Tempat Tinggal', 'required');
        $this->form_validation->set_message('required', '{field} tidak boleh kosong');
        if ($this->form_validation->run()) {
          $params = [
            'tempat_tinggal_nama' => htmlspecialchars($this->input->post('tempat_tinggal_nama')),
          ];
          $this->TempatTinggal->update_tempat_tinggal($id, $params);
          $this->session->set_flashdata('success', 'Tempat Tinggal ' . $tempat_tinggal['tempat_tinggal_nama'] . " Berhasil diubah menjadi Tempat Tinggal " . $params['tempat_tinggal_nama']);
          redirect('admin/master/tempattinggal/index');
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
        $tempat_tinggal = $this->TempatTinggal->get_tempat_tinggal($id);
        $this->load->model('terlantar_model', 'Terlantar');
        if ($this->Terlantar->is_using('tempat_tinggal_id', $id)) {
          $this->session->set_flashdata('error', 'Tempat Tinggal ' . $tempat_tinggal['tempat_tinggal_nama'] . " masih digunakan, tidak bisa dihapus");
          redirect('admin/master/tempattinggal/index');
        }
        if ($tempat_tinggal) {
          $delete = $this->TempatTinggal->delete_tempat_tinggal($id);
          if ($delete) {
            $this->session->set_flashdata('success', 'Tempat Tinggal ' . $tempat_tinggal['tempat_tinggal_nama'] . " berhasil dihapus");
          } else {
            $this->session->set_flashdata('error', 'Tempat Tinggal ' . $tempat_tinggal['tempat_tinggal_nama'] . " gagal dihapus");
          }
          redirect('admin/master/tempattinggal/index');
        } else {
          throw new Exception('Tempat Tinggal tidak ditemukan');
        }
      } else {
        throw new Exception('Halaman tidak ditemukan');
      }
    } catch (Exception $th) {
      show_error($th->getMessage());
    }
  }
}
