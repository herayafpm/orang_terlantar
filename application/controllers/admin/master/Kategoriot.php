<?php
class Kategoriot extends MY_admin_controller
{
  public function __construct()
  {
    parent::__construct();
    $this->isNotSuperAdmin();
    $this->load->model('kategori_ot_model', 'KategoriOt');
  }

  public function index()
  {
    $data['_view'] = 'admin/master/kategori_ot/index';
    $data['_title'] = 'Kategori Orang Terlantar';
    $data['_datatable'] = true;
    $data['_datatable_view'] = 'admin/master/kategori_ot/datatables';
    $data = array_merge($data, $this->data);
    $this->load->view('admin/template', $data);
  }
  public function datatables()
  {
    try {
      $method = $_SERVER['REQUEST_METHOD'];
      if ($method == 'POST') {
        $this->datatable_data($this->KategoriOt);
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
      $data['_view'] = 'admin/master/kategori_ot/add';
      $data['_title'] = 'Tambah Kategori Orang Terlantar ';
      $data = array_merge($data, $this->data);
      if (isset($_POST['simpan'])) {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('kategori_ot_nama', 'Nama Kategori Orang Terlantar', 'required');
        $this->form_validation->set_message('required', '{field} tidak boleh kosong');
        if ($this->form_validation->run()) {
          $params = [
            'kategori_ot_nama' => htmlspecialchars($this->input->post('kategori_ot_nama')),
          ];
          $this->KategoriOt->add_kategori_ot($params);
          $this->session->set_flashdata('success', "Berhasil menambah Kategori Orang Terlantar " . $params['kategori_ot_nama']);
          redirect('admin/master/kategoriot/index');
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
      $kategori_ot = $this->KategoriOt->get_kategori_ot($id);
      $data['_view'] = 'admin/master/kategori_ot/edit';
      $data['_title'] = 'Edit Kategori Orang Terlantar ' . $kategori_ot['kategori_ot_nama'];
      $data['_kategori_ot'] = $kategori_ot;
      $data = array_merge($data, $this->data);
      if (isset($_POST['simpan'])) {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('kategori_ot_nama', 'Nama Kategori Orang Terlantar', 'required');
        $this->form_validation->set_message('required', '{field} tidak boleh kosong');
        if ($this->form_validation->run()) {
          $params = [
            'kategori_ot_nama' => htmlspecialchars($this->input->post('kategori_ot_nama')),
          ];
          $this->KategoriOt->update_kategori_ot($id, $params);
          $this->session->set_flashdata('success', 'Kategori Orang Terlantar ' . $kategori_ot['kategori_ot_nama'] . " Berhasil diubah menjadi Kategori Orang Terlantar " . $params['kategori_ot_nama']);
          redirect('admin/master/kategoriot/index');
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
        $kategori_ot = $this->KategoriOt->get_kategori_ot($id);
        $this->load->model('terlantar_model', 'Terlantar');
        if ($this->Terlantar->is_using('kategori_ot_id', $id)) {
          $this->session->set_flashdata('error', 'Kategori Orang Terlantar ' . $kategori_ot['kategori_ot_nama'] . " masih digunakan, tidak bisa dihapus");
          redirect('admin/master/kategoriot/index');
        }
        if ($kategori_ot) {
          $delete = $this->KategoriOt->delete_kategori_ot($id);
          if ($delete) {
            $this->session->set_flashdata('success', 'Kategori Orang Terlantar ' . $kategori_ot['kategori_ot_nama'] . " berhasil dihapus");
          } else {
            $this->session->set_flashdata('error', 'Kategori Orang Terlantar ' . $kategori_ot['kategori_ot_nama'] . " gagal dihapus");
          }
          redirect('admin/master/kategoriot/index');
        } else {
          throw new Exception('Kategori Orang Terlantar tidak ditemukan');
        }
      } else {
        throw new Exception('Halaman tidak ditemukan');
      }
    } catch (Exception $th) {
      show_error($th->getMessage());
    }
  }
}
