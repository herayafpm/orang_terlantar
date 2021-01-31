<?php

class Orangterlantar extends MY_admin_controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('terlantar_proses_model', 'TerlantarProses');
    $this->load->model('terlantar_verif_model', 'TerlantarVerif');
    $this->load->model('terlantar_tolak_model', 'TerlantarTolak');
  }
  public function data($id, $status)
  {
    try {
      $this->load->model('sumber_dana_model', 'SumberDana');
      $this->load->model('bansos_model', 'Bansos');
      $this->load->model('tempat_tinggal_model', 'TempatTinggal');
      $this->load->model('kondisi_tempat_tinggal_model', 'KondisiTempatTinggal');
      $this->load->model('kategori_ot_model', 'KategoriOt');
      $this->load->model('fasilitas_kesehatan_model', 'FasilitasKesehatan');
      $this->load->model('kondisi_ot_model', 'KondisiOt');
      $this->load->model('kebutuhan_diperlukan_model', 'KebutuhanDiperlukan');
      $data['_view'] = "admin/orang_terlantar/$status/index";
      $data['_title'] = 'Data Orang Terlantar';
      $data = array_merge($data, $this->data);
      $data['_orang_terlantar'] = $this->getOrangTerlantar($id);
      if ($data['_orang_terlantar'] == false) {
        throw new Exception("Jenis Orang Terlantar Tidak Ditemukkan");
      }
      $data['_title'] = $data['_title'] . " " . $data['_orang_terlantar']['orang_terlantar_nama'];
      $data['_datatable'] = true;
      $data['_datatable_view'] = "admin/orang_terlantar/$status/datatables";
      $data['_admin'] = $this->admin;
      $data['_status'] = $status;
      $data['_id'] = $id;
      $data['_datatable_scroll_y'] = "400px";
      $data['_desas'] = json_encode($this->Terlantar->get_distinct_terlantar('terlantar_desa'));
      $data['_kecamatans'] = json_encode($this->Terlantar->get_distinct_terlantar('terlantar_kecamatan'));
      $data['_kabupatens'] = json_encode($this->Terlantar->get_distinct_terlantar('terlantar_kabupaten'));
      $data['_tempat_tinggals'] = json_encode($this->loopingSelect('tempat_tinggal', $this->TempatTinggal->get_all_tempat_tinggal()));
      $data['_kondisi_tempat_tinggals'] = json_encode($this->loopingSelect('kondisi_tempat_tinggal', $this->KondisiTempatTinggal->get_all_kondisi_tempat_tinggal()));
      $data['_kategori_ots'] = json_encode($this->loopingSelect('kategori_ot', $this->KategoriOt->get_all_kategori_ot()));
      $data['_fasilitas_kesehatans'] = json_encode($this->loopingSelect('fasilitas_kesehatan', $this->FasilitasKesehatan->get_all_fasilitas_kesehatan()));
      $data['_kondisi_ots'] = json_encode($this->loopingSelect('kondisi_ot', $this->KondisiOt->get_all_kondisi_ot()));
      $data['_kebutuhan_diperlukans'] = json_encode($this->loopingSelect('kebutuhan_diperlukan', $this->KebutuhanDiperlukan->get_all_kebutuhan_diperlukan(), ['id' => "0", 'nama' => 'Lain - Lain']));
      $data['_sumber_danas'] = json_encode($this->SumberDana->get_all_sumber_dana());
      $data['_bansoss'] = json_encode($this->Bansos->get_all_bansos());
      $this->load->view('admin/template', $data);
    } catch (Exception $th) {
      show_error($th->getMessage());
    }
  }
  private function loopingSelect($table, $datas, $lain = [])
  {
    $dataData = [];
    foreach ($datas as $data) {
      array_push($dataData, [
        'id' => $data[$table . '_id'],
        'nama' => $data[$table . '_nama'],
      ]);
    }
    if (sizeof($lain) > 0) {
      array_push($dataData, $lain);
    }
    return $dataData;
  }
  public function proses($id)
  {
    header('Content-Type: application/json');
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
      if (isset($_POST['batal'])) {
        if ($this->TerlantarProses->delete_terlantar_proses($id)) {
          $this->Terlantar->update_terlantar($id, ['proses_id' => null]);
          $this->session->set_flashdata('success', "Berhasil membatalkan proses data orang terlantar");
          redirect_back();
        } else {
          $this->session->set_flashdata('error', "Gagal membatalkan proses data orang terlantar");
          redirect_back();
        }
      }
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
          $proses_id = $this->TerlantarProses->add_terlantar_proses($id, $this->admin['admin_id']);
          $this->Terlantar->update_terlantar($id, ['proses_id' => $proses_id]);
          header("HTTP/1.0 200 Success");
          echo json_encode("<p>Berhasil Memproses Data Orang Terlantar</p>"); // Convert array $callback ke json
        } else {
          header("HTTP/1.0 400 Client Error");
          echo json_encode("<p>Gagal Memproses Data Orang Terlantar</p>"); // Convert array $callback ke json
        }
      } else {
        header("HTTP/1.0 400 Client Error");
        echo json_encode(validation_errors()); // Convert array $callback ke json
      }
    } else {
      header("HTTP/1.0 404 Not Found");
    }
  }
  public function tolak($id)
  {
    try {
      if ($_SERVER['REQUEST_METHOD'] != "POST") {
        throw new Exception('halaman tidak ditemukan');
      }
      $terlantar = $this->Terlantar->get_terlantar($id);
      if ($terlantar) {
        if (isset($_POST['batal'])) {
          if ($this->TerlantarTolak->delete_terlantar_tolak($id)) {
            $this->Terlantar->update_terlantar($id, ['tolak_id' => null]);
            $this->session->set_flashdata('success', "Berhasil membatalkan penolakan data orang terlantar");
            redirect_back();
          } else {
            $this->session->set_flashdata('error', "Gagal membatalkan penolakan data orang terlantar");
            redirect_back();
          }
        } else {
          $tolak_id = $this->TerlantarTolak->add_terlantar_tolak($id, $this->admin['admin_id']);
          if ($tolak_id > 0) {
            $this->Terlantar->update_terlantar($id, ['tolak_id' => $tolak_id]);
            $this->session->set_flashdata('success', "Berhasil menolak data orang terlantar");
            redirect_back();
          } else {
            $this->session->set_flashdata('error', "Gagal menolak data orang terlantar");
            redirect_back();
          }
        }
      } else {
        throw new Exception('data orang terlantar tidak ditemukan');
      }
    } catch (Exception $th) {
      $this->session->set_flashdata('error', $th->getMessage());
      redirect_back();
    }
  }
  public function verif($id)
  {
    try {
      if ($_SERVER['REQUEST_METHOD'] != "POST") {
        throw new Exception('halaman tidak ditemukan');
      }
      $terlantar = $this->Terlantar->get_terlantar($id);
      if ($terlantar) {
        if (isset($_POST['batal'])) {
          if ($this->TerlantarVerif->delete_terlantar_verif($id)) {
            $this->Terlantar->update_terlantar($id, ['verif_id' => null]);
            $this->session->set_flashdata('success', "Berhasil membatalkan verifikasi data orang terlantar");
            redirect_back();
          } else {
            $this->session->set_flashdata('error', "Gagal membatalkan verifikasi data orang terlantar");
            redirect_back();
          }
        } else {
          $verif_id = $this->TerlantarVerif->add_terlantar_verif($id, $this->admin['admin_id']);
          if ($verif_id > 0) {
            $this->Terlantar->update_terlantar($id, ['verif_id' => $verif_id]);
            $this->session->set_flashdata('success', "Berhasil memverif data orang terlantar");
            redirect_back();
          } else {
            $this->session->set_flashdata('error', "Gagal memverif data orang terlantar");
            redirect_back();
          }
        }
      } else {
        throw new Exception('data orang terlantar tidak ditemukan');
      }
    } catch (Exception $th) {
      $this->session->set_flashdata('error', $th->getMessage());
      redirect_back();
    }
  }
  // public function delete($id)
  // {
  //   try {
  //     $method = $_SERVER['REQUEST_METHOD'];
  //     if ($method == 'POST') {
  //       $terlantar = $this->Terlantar->get_terlantar($id);
  //       if ($terlantar) {
  //         $delete = $this->Terlantar->delete_terlantar($id);
  //         if ($delete) {
  //           $this->TerlantarProses->delete_terlantar_proses($id);
  //           $this->TerlantarVerif->delete_terlantar_verif($id);
  //           $this->TerlantarTolak->delete_terlantar_tolak($id);
  //           $this->session->set_flashdata('success', 'Orang Terlantar ' . $terlantar['terlantar_nama'] . " berhasil dihapus");
  //         } else {
  //           $this->session->set_flashdata('error', 'Orang Terlantar ' . $terlantar['terlantar_nama'] . " gagal dihapus");
  //         }
  //         redirect_back();
  //       } else {
  //         throw new Exception('Tempat Tinggal tidak ditemukan');
  //       }
  //     } else {
  //       throw new Exception('Halaman tidak ditemukan');
  //     }
  //   } catch (Exception $th) {
  //     show_error($th->getMessage());
  //   }
  // }
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
  protected function getOrangTerlantar($id)
  {
    foreach ($this->data['_orang_terlantars'] as $val) {
      if ($val['orang_terlantar_id'] == $id) {
        return $val;
      }
    }
    return false;
  }
  public function datatables($id, $status)
  {
    try {
      $method = $_SERVER['REQUEST_METHOD'];
      if ($method == 'POST') {
        $where = ['terlantar.orang_terlantar_id' => $id];
        switch ($status) {
          case 'belum':
            $where['terlantar.proses_id'] = NULL;
            $where['terlantar.verif_id'] = NULL;
            $where['terlantar.tolak_id'] = NULL;
            break;
          case 'sudah':
            $where['terlantar.proses_id !='] = NULL;
            $where['terlantar.verif_id'] = NULL;
            $where['terlantar.tolak_id'] = NULL;
            break;
          case 'verif':
            $where['terlantar.verif_id !='] = NULL;
            break;
          case 'tolak':
            $where['terlantar.tolak_id !='] = NULL;
            break;
        }
        $like = null;
        if (!empty($_POST['desa'])) {
          $where['terlantar_desa'] = htmlspecialchars($_POST['desa']);
        }
        if (!empty($_POST['kecamatan'])) {
          $where['terlantar_kecamatan'] = htmlspecialchars($_POST['kecamatan']);
        }
        if (!empty($_POST['kabupaten'])) {
          $where['terlantar_kabupaten'] = htmlspecialchars($_POST['kabupaten']);
        }
        if (!empty($_POST['tempat_tinggal_id'])) {
          $where['terlantar.tempat_tinggal_id'] = htmlspecialchars($_POST['tempat_tinggal_id']);
        }
        if (!empty($_POST['kondisi_tempat_tinggal_id'])) {
          $where['terlantar.kondisi_tempat_tinggal_id'] = htmlspecialchars($_POST['kondisi_tempat_tinggal_id']);
        }
        if (!empty($_POST['kategori_ot_id'])) {
          $where['terlantar.kategori_ot_id'] = htmlspecialchars($_POST['kategori_ot_id']);
        }
        if (!empty($_POST['fasilitas_kesehatan_id'])) {
          $where['terlantar.fasilitas_kesehatan_id'] = htmlspecialchars($_POST['fasilitas_kesehatan_id']);
        }
        if (!empty($_POST['kondisi_ot_id'])) {
          $where['terlantar.kondisi_ot_id'] = htmlspecialchars($_POST['kondisi_ot_id']);
        }
        if ($_POST['kebutuhan_diperlukan_id'] != "") {
          $kebutuhan_diperlukan_id = htmlspecialchars($_POST['kebutuhan_diperlukan_id']);
          if ($kebutuhan_diperlukan_id == "0") {
            $where['terlantar.kebutuhan_diperlukan_id'] = NULL;
          } else {
            $where['terlantar.kebutuhan_diperlukan_id'] = $kebutuhan_diperlukan_id;
          }
        }
        if (!empty($_POST['date'])) {
          $date = explode('/', htmlspecialchars($_POST['date']));
          $where['terlantar.created_at >='] = $date[0] . " 00:00:00";
          $where['terlantar.created_at <='] = $date[1] . " 23:59:59";
        }
        if (!empty($_POST['nik'])) {
          $like['terlantar_nik'] = htmlspecialchars($_POST['nik']);
        }
        if (!empty($_POST['no_kk'])) {
          $like['terlantar_no_kk'] = htmlspecialchars($_POST['no_kk']);
        }
        if (!empty($_POST['nama'])) {
          $like['terlantar_nama'] = htmlspecialchars($_POST['nama']);
        }
        $params['where'] = $where;
        $params['like'] = $like;
        $this->datatable_where($this->Terlantar, $params);
      } else {
        throw new Exception("Halaman tidak ditemukkan");
      }
    } catch (Exception $th) {
      show_error($th->getMessage());
    }
  }
  private function datatable_where($model, $params = [])
  {
    $search = $_POST['search']['value']; // Ambil data yang di ketik user pada textbox pencarian
    $limit = $_POST['length']; // Ambil data limit per page
    $start = $_POST['start']; // Ambil data start
    $order_index = $_POST['order'][0]['column']; // Untuk mengambil index yg menjadi acuan untuk sorting
    $order_field = $_POST['columns'][$order_index]['data']; // Untuk mengambil nama field yg menjadi acuan untuk sorting
    $order_ascdesc = $_POST['order'][0]['dir']; // Untuk menentukan order by "ASC" atau "DESC"
    $sql_total = $model->count_all($params); // Panggil fungsi count_all pada Admin
    $sql_data = $model->filter($search, $limit, $start, $order_field, $order_ascdesc, $params); // Panggil fungsi filter pada Admin
    $sql_filter = $model->count_filter($search, $params); // Panggil fungsi count_filter pada Admin
    $callback = [
      'draw' => $_POST['draw'], // Ini dari datatablenya
      'recordsTotal' => $sql_total,
      'recordsFiltered' => $sql_filter,
      'data' => $sql_data
    ];
    header('Content-Type: application/json');
    echo json_encode($callback); // Convert array $callback ke json
  }
}
