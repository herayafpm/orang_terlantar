<?php
class Fasilitaskesehatan extends MY_admin_controller
{
  public function __construct()
  {
    parent::__construct();
    $this->isNotSuperAdmin();
    $this->load->model('fasilitas_kesehatan_model', 'FasilitasKesehatan');
  }

  public function index()
  {
    $data['_view'] = 'admin/master/fasilitas_kesehatan/index';
    $data['_title'] = 'Fasilitas Kesehatan';
    $data['_datatable'] = true;
    $data['_datatable_view'] = 'admin/master/fasilitas_kesehatan/datatables';
    $data = array_merge($data, $this->data);
    $this->load->view('admin/template', $data);
  }
  public function datatables()
  {
    try {
      $method = $_SERVER['REQUEST_METHOD'];
      if ($method == 'POST') {
        $this->datatable_data($this->FasilitasKesehatan);
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
      $data['_view'] = 'admin/master/fasilitas_kesehatan/add';
      $data['_title'] = 'Tambah Fasilitas Kesehatan ';
      $data = array_merge($data, $this->data);
      if (isset($_POST['simpan'])) {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('fasilitas_kesehatan_nama', 'Nama Fasilitas Kesehatan', 'required');
        $this->form_validation->set_message('required', '{field} tidak boleh kosong');
        if ($this->form_validation->run()) {
          $params = [
            'fasilitas_kesehatan_nama' => htmlspecialchars($this->input->post('fasilitas_kesehatan_nama')),
          ];
          $this->FasilitasKesehatan->add_fasilitas_kesehatan($params);
          $this->session->set_flashdata('success', "Berhasil menambah Fasilitas Kesehatan " . $params['fasilitas_kesehatan_nama']);
          redirect('admin/master/fasilitaskesehatan/index');
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
      $fasilitas_kesehatan = $this->FasilitasKesehatan->get_fasilitas_kesehatan($id);
      $data['_view'] = 'admin/master/fasilitas_kesehatan/edit';
      $data['_title'] = 'Edit Fasilitas Kesehatan ' . $fasilitas_kesehatan['fasilitas_kesehatan_nama'];
      $data['_fasilitas_kesehatan'] = $fasilitas_kesehatan;
      $data = array_merge($data, $this->data);
      if (isset($_POST['simpan'])) {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('fasilitas_kesehatan_nama', 'Nama Fasilitas Kesehatan', 'required');
        $this->form_validation->set_message('required', '{field} tidak boleh kosong');
        if ($this->form_validation->run()) {
          $params = [
            'fasilitas_kesehatan_nama' => htmlspecialchars($this->input->post('fasilitas_kesehatan_nama')),
          ];
          $this->FasilitasKesehatan->update_fasilitas_kesehatan($id, $params);
          $this->session->set_flashdata('success', 'Fasilitas Kesehatan ' . $fasilitas_kesehatan['fasilitas_kesehatan_nama'] . " Berhasil diubah menjadi Fasilitas Kesehatan " . $params['fasilitas_kesehatan_nama']);
          redirect('admin/master/fasilitaskesehatan/index');
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
        $fasilitas_kesehatan = $this->FasilitasKesehatan->get_fasilitas_kesehatan($id);
        $this->load->model('terlantar_model', 'Terlantar');
        if ($this->Terlantar->is_using('fasilitas_kesehatan_id', $id)) {
          $this->session->set_flashdata('error', 'Fasilitas Kesehatan ' . $fasilitas_kesehatan['fasilitas_kesehatan_nama'] . " masih digunakan, tidak bisa dihapus");
          redirect('admin/master/fasilitaskesehatan/index');
        }
        if ($fasilitas_kesehatan) {
          $delete = $this->FasilitasKesehatan->delete_fasilitas_kesehatan($id);
          if ($delete) {
            $this->session->set_flashdata('success', 'Fasilitas Kesehatan ' . $fasilitas_kesehatan['fasilitas_kesehatan_nama'] . " berhasil dihapus");
          } else {
            $this->session->set_flashdata('error', 'Fasilitas Kesehatan ' . $fasilitas_kesehatan['fasilitas_kesehatan_nama'] . " gagal dihapus");
          }
          redirect('admin/master/fasilitaskesehatan/index');
        } else {
          throw new Exception('Fasilitas Kesehatan tidak ditemukan');
        }
      } else {
        throw new Exception('Halaman tidak ditemukan');
      }
    } catch (Exception $th) {
      show_error($th->getMessage());
    }
  }
}
