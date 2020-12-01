<?php
class Terlantar extends MY_admin_controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('terlantar_model', 'Terlantar');
  }

  public function index()
  {
    $data['_view'] = 'admin/terlantar/index';
    $data['_title'] = 'Orang Terlantar';
    $data['_datatable'] = true;
    $data['_datatable_view'] = 'admin/terlantar/datatables';
    $data = array_merge($data, $this->data);
    $this->load->view('admin/template', $data);
  }
  public function datatables()
  {
    try {
      $method = $_SERVER['REQUEST_METHOD'];
      if ($method == 'POST') {
        $this->datatable_data($this->Terlantar);
      } else {
        throw new Exception("Halaman tidak ditemukkan");
      }
    } catch (Exception $th) {
      show_error($th->getMessage());
    }
  }
  public function show($id)
  {
    try {
      $terlantar = $this->Terlantar->get_terlantar_detail($id);
      if ($terlantar) {
        $terlantar['sumber_dana_id'] = $terlantar['sumber_dana_id'] ?? 0;
        $this->load->model('sumber_dana_model', 'SumberDana');
        $this->load->model('bansos_model', 'Bansos');
        $data['_view'] = 'admin/terlantar/show';
        $data['_title'] = 'Data Orang Terlantar ' . $terlantar['terlantar_nama'];
        $data['_terlantar'] = $terlantar;
        $data['_sumber_danas'] = $this->SumberDana->get_all_sumber_dana();
        $data['_bansoss'] = $this->Bansos->get_all_bansos();
        $data = array_merge($data, $this->data);
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method == 'POST') {
          $admin_id = $this->admin['admin_id'];
          if (isset($_POST['verifikasi'])) {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('sumber_dana_id', 'Sumber Dana', 'callback_validateSelect[true]');
            $this->form_validation->set_rules('bansos_id', 'Bantuan Sosial', 'callback_validateSelectBansos[' . $_POST['sumber_dana_id'] . ']');
            $this->form_validation->set_rules('sumber_dana_lainnya', 'Sumber Dana Lainnya', 'callback_validateCustomBansos[' . $_POST['sumber_dana_id'] . ']');
            $this->form_validation->set_rules('bansos_lainnya', 'Bantuan Sosial Lainnya', 'callback_validateCustomBansos[' . $_POST['sumber_dana_id'] . ']');
            $this->form_validation->set_message('validateSelect', 'harus pilih {field}');
            $this->form_validation->set_message('validateSelectBansos', 'harus pilih {field}');
            $this->form_validation->set_message('validateCustomBansos', '{field} tidak bolek kosong');
            if ($this->form_validation->run()) {
              $params = [
                'sumber_dana_id' => htmlspecialchars($this->input->post('sumber_dana_id')),
                'bansos_id' => htmlspecialchars($this->input->post('bansos_id')),
                'keterangan' => htmlspecialchars($this->input->post('keterangan')),
              ];
              $params['sumber_dana_id'] = ($params['sumber_dana_id'] == "0") ? null : $params['sumber_dana_id'];
              if ($params['sumber_dana_id'] == null) {
                $params['bansos_id'] = null;
                $params['sumber_dana_lainnya'] = htmlspecialchars(strtoupper($this->input->post('sumber_dana_lainnya')));
                $params['bansos_lainnya'] = htmlspecialchars(strtoupper($this->input->post('bansos_lainnya')));
              }
              if ($this->Terlantar->update_terlantar($id, $params)) {
                $this->Terlantar->set_status($id, 'verif', $this->session->admin_id, 1);
                $this->session->set_flashdata('success', "Berhasil verifikasi");
                redirect('admin/terlantar/show/' . $id);
              } else {
                $this->session->set_flashdata('error', "Gagal verifikasi");
                redirect('admin/terlantar/show/' . $id);
              }
            } else {
              $this->session->set_flashdata('error', 'Validasi Error');
              $this->load->view('admin/template', $data);
            }
          } else if (isset($_POST['batal_verifikasi'])) {
            $params = [
              'sumber_dana_id' => null,
              'sumber_dana_lainnya' => null,
              'bansos_id' => null,
              'bansos_lainnya' => null,
              'keterangan' => "",
            ];
            if ($this->Terlantar->update_terlantar($id, $params)) {
              $this->Terlantar->set_status($id, 'verif', null, 0);
              $this->Terlantar->set_status($id, 'terima', null, 0);
              $this->Terlantar->set_status($id, 'tolak', null, 0);
              $this->session->set_flashdata('success', "Berhasil membatalkan verifikasi");
              redirect('admin/terlantar/show/' . $id);
            } else {
              $this->session->set_flashdata('error', "Gagal membatalkan verifikasi");
              redirect('admin/terlantar/show/' . $id);
            }
          } else if (isset($_POST['tolak'])) {
            if ($this->Terlantar->set_status($id, 'tolak', $this->session->admin_id, 1)) {
              $this->Terlantar->set_status($id, 'terima', $this->session->admin_id, 0);
              $this->session->set_flashdata('success', "Berhasil menolak data terlantar");
              redirect('admin/terlantar/show/' . $id);
            } else {
              $this->session->set_flashdata('error', "Gagal menolak data terlantar");
              redirect('admin/terlantar/show/' . $id);
            }
          } else if (isset($_POST['terima'])) {
            if ($this->Terlantar->set_status($id, 'terima', $this->session->admin_id, 1)) {
              $this->Terlantar->set_status($id, 'tolak', $this->session->admin_id, 0);
              $this->session->set_flashdata('success', "Berhasil menerima data terlantar");
              redirect('admin/terlantar/show/' . $id);
            } else {
              $this->session->set_flashdata('error', "Gagal menerima data terlantar");
              redirect('admin/terlantar/show/' . $id);
            }
          }
        } else {
          $this->load->view('admin/template', $data);
        }
      } else {
        throw new Exception('terlantar tidak ditemukan');
      }
    } catch (Exception $th) {
      $this->session->set_flashdata('error', $th->getMessage());
      redirect('admin/terlantar');
    }
  }
  public function getbantuan($sumber_dana_id)
  {
    try {
      $this->load->model('bansos_model', 'Bansos');
      $bansos = $this->Bansos->get_bansos_by_sumber_id($sumber_dana_id);
      header('application/json');
      echo json_encode($bansos);
    } catch (Exception $th) {
      header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error', true, 500);
      header('application/json');
      echo json_encode($th->getMessage);
    }
  }
  function validateSelect($str, $null = false)
  {
    if ($null) {
      if ($str == "0") {
        return true;
      } else if (!empty($str)) {
        return true;
      }
    } else {
      if (!empty($str)) {
        return true;
      }
    }
    return false;
  }
  function validateCustomBansos($str, $sumber)
  {
    if ($sumber == "0") {
      if (!empty($str)) {
        return true;
      }
    } else {
      return true;
    }
    return false;
  }
  function validateSelectBansos($str, $sumber_dana_id)
  {
    if ($sumber_dana_id == "0") {
      return true;
    } else if (!empty($sumber_dana_id) && !empty($str)) {
      return true;
    }
    return false;
  }
  public function verif($id)
  {
    try {
      $terlantar = $this->Terlantar->get_terlantar($id);
      if ($terlantar) {
        $status = $this->input->get('status') ?? 0;
        $params = [
          'verif' => $status,
          'verif_by' => $this->admin['admin_id'],
        ];
        if ((bool) $status == false) {
          $params['verif_by'] = null;
        }
        if ($this->Terlantar->update_terlantar($id, $params)) {
          $this->session->set_flashdata('success', "Berhasil mengubah status verifikasi");
          redirect('admin/terlantar/show/' . $id);
        } else {
          $this->session->set_flashdata('error', "Gagal mengubah status verifikasi");
          redirect('admin/terlantar/show/' . $id);
        }
      } else {
        throw new Exception('terlantar tidak ditemukan');
      }
    } catch (Exception $th) {
      $this->session->set_flashdata('error', $th->getMessage());
      redirect('admin/terlantar');
    }
  }

  public function delete($id)
  {
    try {
      $method = $_SERVER['REQUEST_METHOD'];
      if ($method == 'POST') {
        $terlantar = $this->Terlantar->get_terlantar($id);
        if ($terlantar) {
          $delete = $this->Terlantar->delete_terlantar($id);
          if ($delete) {
            $this->session->set_flashdata('success', 'Orang Terlantar ' . $terlantar['terlantar_nama'] . " berhasil dihapus");
          } else {
            $this->session->set_flashdata('error', 'Orang Terlantar ' . $terlantar['terlantar_nama'] . " gagal dihapus");
          }
          redirect('admin/terlantar/index');
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
