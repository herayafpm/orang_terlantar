<?php
class Kondisitempattinggal extends MY_admin_controller
{
  public function __construct()
  {
    parent::__construct();
    $this->isNotSuperAdmin();
    $this->load->model('kondisi_tempat_tinggal_model', 'KondisiTempatTinggal');
  }

  public function index()
  {
    $data['_view'] = 'admin/master/kondisi_tempat_tinggal/index';
    $data['_title'] = 'Kondisi Tempat Tinggal';
    $data['_datatable'] = true;
    $data['_datatable_view'] = 'admin/master/kondisi_tempat_tinggal/datatables';
    $data = array_merge($data, $this->data);
    $this->load->view('admin/template', $data);
  }
  public function datatables()
  {
    try {
      $method = $_SERVER['REQUEST_METHOD'];
      if ($method == 'POST') {
        $this->datatable_data($this->KondisiTempatTinggal);
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
      $data['_view'] = 'admin/master/kondisi_tempat_tinggal/add';
      $data['_title'] = 'Tambah Kondisi Tempat Tinggal ';
      $data = array_merge($data, $this->data);
      if (isset($_POST['simpan'])) {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('kondisi_tempat_tinggal_nama', 'Nama Kondisi Tempat Tinggal', 'required');
        $this->form_validation->set_message('required', '{field} tidak boleh kosong');
        if ($this->form_validation->run()) {
          $params = [
            'kondisi_tempat_tinggal_nama' => htmlspecialchars($this->input->post('kondisi_tempat_tinggal_nama')),
          ];
          $this->KondisiTempatTinggal->add_kondisi_tempat_tinggal($params);
          $this->session->set_flashdata('success', "Berhasil menambah Kondisi Tempat Tinggal " . $params['kondisi_tempat_tinggal_nama']);
          redirect('admin/master/kondisitempattinggal/index');
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
      $kondisi_tempat_tinggal = $this->KondisiTempatTinggal->get_kondisi_tempat_tinggal($id);
      $data['_view'] = 'admin/master/kondisi_tempat_tinggal/edit';
      $data['_title'] = 'Edit Kondisi Tempat Tinggal ' . $kondisi_tempat_tinggal['kondisi_tempat_tinggal_nama'];
      $data['_kondisi_tempat_tinggal'] = $kondisi_tempat_tinggal;
      $data = array_merge($data, $this->data);
      if (isset($_POST['simpan'])) {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('kondisi_tempat_tinggal_nama', 'Nama Kondisi Tempat Tinggal', 'required');
        $this->form_validation->set_message('required', '{field} tidak boleh kosong');
        if ($this->form_validation->run()) {
          $params = [
            'kondisi_tempat_tinggal_nama' => htmlspecialchars($this->input->post('kondisi_tempat_tinggal_nama')),
          ];
          $this->KondisiTempatTinggal->update_kondisi_tempat_tinggal($id, $params);
          $this->session->set_flashdata('success', 'Kondisi Tempat Tinggal ' . $kondisi_tempat_tinggal['kondisi_tempat_tinggal_nama'] . " Berhasil diubah menjadi Kondisi Tempat Tinggal " . $params['kondisi_tempat_tinggal_nama']);
          redirect('admin/master/kondisitempattinggal/index');
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
        $kondisi_tempat_tinggal = $this->KondisiTempatTinggal->get_kondisi_tempat_tinggal($id);
        $this->load->model('terlantar_model', 'Terlantar');
        if ($this->Terlantar->is_using('kondisi_tempat_tinggal_id', $id)) {
          $this->session->set_flashdata('error', 'Kondisi Tempat Tinggal ' . $kondisi_tempat_tinggal['kondisi_tempat_tinggal_nama'] . " masih digunakan, tidak bisa dihapus");
          redirect('admin/master/kondisitempattinggal/index');
        }
        if ($kondisi_tempat_tinggal) {
          $delete = $this->KondisiTempatTinggal->delete_kondisi_tempat_tinggal($id);
          if ($delete) {
            $this->session->set_flashdata('success', 'Kondisi Tempat Tinggal ' . $kondisi_tempat_tinggal['kondisi_tempat_tinggal_nama'] . " berhasil dihapus");
          } else {
            $this->session->set_flashdata('error', 'Kondisi Tempat Tinggal ' . $kondisi_tempat_tinggal['kondisi_tempat_tinggal_nama'] . " gagal dihapus");
          }
          redirect('admin/master/kondisitempattinggal/index');
        } else {
          throw new Exception('Kondisi Tempat Tinggal tidak ditemukan');
        }
      } else {
        throw new Exception('Halaman tidak ditemukan');
      }
    } catch (Exception $th) {
      show_error($th->getMessage());
    }
  }
}
