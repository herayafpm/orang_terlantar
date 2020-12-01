<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Laporanorangterlantar extends MY_admin_controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('terlantar_proses_model', 'TerlantarProses');
    $this->load->model('terlantar_verif_model', 'TerlantarVerif');
    $this->load->model('terlantar_tolak_model', 'TerlantarTolak');
  }
  public function view($id, $status)
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
      $data['_view'] = "admin/laporan_orang_terlantar/$status/index";
      $data['_title'] = 'Laporan Orang Terlantar';
      $data = array_merge($data, $this->data);
      $data['_orang_terlantar'] = $this->getOrangTerlantar($id);
      if ($data['_orang_terlantar'] == false) {
        throw new Exception("Jenis Orang Terlantar Tidak Ditemukkan");
      }
      $data['_title'] = $data['_title'] . " " . $data['_orang_terlantar']['orang_terlantar_nama'];
      $data['_datatable'] = true;
      $data['_datatable_view'] = "admin/laporan_orang_terlantar/$status/datatables";
      $data['_excel'] = "admin/laporan_orang_terlantar/$status/excel";
      $data['_print'] = "admin/laporan_orang_terlantar/$status/print";
      $data['_admin'] = $this->admin;
      $data['_status'] = $status;
      $data['_id'] = $id;
      $data['_datatable_scroll_y'] = "200px";
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
  protected function getOrangTerlantar($id)
  {
    foreach ($this->data['_orang_terlantars'] as $val) {
      if ($val['orang_terlantar_id'] == $id) {
        return $val;
      }
    }
    return false;
  }
  public function excel($id, $status)
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
        $this->excel_proses($params);
      } else {
        throw new Exception("<p>Gagal Membuat Laporan Orang Terlantar</p>");
      }
    } catch (Exception $th) {
      header("HTTP/1.0 500 Server error");
      echo json_encode($th->getMessage()); // Convert array $callback ke json
    }
  }
  function excel_proses($params = [])
  {
    try {
      $spreadsheet = new Spreadsheet();
      $sheet = $spreadsheet->getActiveSheet();
      $sheet->setCellValue('A1', 'NO');
      $sheet->setCellValue('B1', 'NIK');
      $sheet->setCellValue('C1', 'NO KK');
      $sheet->setCellValue('D1', 'NAMA');
      $sheet->setCellValue('E1', 'TEMPAT LAHIR');
      $sheet->setCellValue('F1', 'TANGGAL LAHIR');
      $sheet->setCellValue('G1', 'JENIS KELAMIN');
      $sheet->setCellValue('H1', 'AGAMA');
      $sheet->setCellValue('I1', 'JL');
      $sheet->setCellValue('J1', 'RT');
      $sheet->setCellValue('K1', 'RW');
      $sheet->setCellValue('L1', 'DESA');
      $sheet->setCellValue('M1', 'KEC');
      $sheet->setCellValue('N1', 'TEMPAT TINGGAL');
      $sheet->setCellValue('O1', 'KONDISI TMP TINGGAL');
      $sheet->setCellValue('P1', 'KATEGORI OT');
      $sheet->setCellValue('Q1', 'FASKES');
      $sheet->setCellValue('R1', 'KONDISI OT');
      $sheet->setCellValue('S1', 'KEBUTUHAN');
      $sheet->setCellValue('T1', 'BANSOS YG DITERIMA');
      $sheet->setCellValue('U1', 'PERMASALAH YG DIHADAPI');
      $sheet->setCellValue('V1', 'TUJUAN PERJALANAN');
      $sheet->setCellValue('W1', 'PEMBERI BANTUAN');
      $sheet->setCellValue('X1', 'KETERANGAN');
      $sheet->setCellValue('Z1', 'DIAJUKAN PADA');
      $terlantars = [];
      $filename = 'Laporan Semua Orang Terlantar';
      $terlantars = $this->Terlantar->filter(null, null, null, null, null, $params);

      $no = 1;
      $x = 2;
      foreach ($terlantars as $terlantar) {
        $sheet->setCellValue('A' . $x, $no++);
        $sheet->setCellValue('B' . $x, "'" . $terlantar['terlantar_nik']);
        $sheet->setCellValue('C' . $x, "'" . $terlantar['terlantar_no_kk']);
        $sheet->setCellValue('D' . $x, $terlantar['terlantar_nama']);
        $sheet->setCellValue('E' . $x, $terlantar['terlantar_tempat_lahir']);
        $sheet->setCellValue('F' . $x, $terlantar['terlantar_tanggal_lahir']);
        $sheet->setCellValue('G' . $x, $terlantar['terlantar_jenis_kelamin']);
        $sheet->setCellValue('H' . $x, $terlantar['agama_nama']);
        $sheet->setCellValue('I' . $x, $terlantar['terlantar_alamat']);
        $sheet->setCellValue('J' . $x, $terlantar['terlantar_rt']);
        $sheet->setCellValue('K' . $x, $terlantar['terlantar_rw']);
        $sheet->setCellValue('L' . $x, $terlantar['terlantar_desa']);
        $sheet->setCellValue('M' . $x, $terlantar['terlantar_kecamatan']);
        $sheet->setCellValue('N' . $x, $terlantar['tempat_tinggal_nama']);
        $sheet->setCellValue('O' . $x, $terlantar['kondisi_tempat_tinggal_nama']);
        $sheet->setCellValue('P' . $x, $terlantar['kategori_ot_nama']);
        $sheet->setCellValue('Q' . $x, $terlantar['fasilitas_kesehatan_nama']);
        $sheet->setCellValue('R' . $x, $terlantar['kondisi_ot_nama']);
        $sheet->setCellValue('S' . $x, $terlantar['kebutuhan_diperlukan_nama'] ?? $terlantar['kebutuhan_diperlukan_lainnya']);
        $sheet->setCellValue('T' . $x, ($terlantar['sumber_dana_id'] != null) ? $terlantar['bansos_nama'] . " Rp." . $terlantar['bansos_total'] : "Tidak Ada");
        $sheet->setCellValue('U' . $x, $terlantar['alasan_terlantar']);
        $sheet->setCellValue('V' . $x, $terlantar['tujuan_alamat']);
        $sheet->setCellValue('W' . $x, ($terlantar['sumber_dana_id'] != null) ? $terlantar['sumber_dana_nama'] : "Tidak Ada");
        $sheet->setCellValue('X' . $x, $terlantar['keterangan']);
        $sheet->setCellValue('Z' . $x, $terlantar['created_at']);
        $x++;
      }
      $writer = new Xlsx($spreadsheet);

      header('Content-Type: application/vnd.ms-excel');
      header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
      header('Cache-Control: max-age=0');

      $writer->save('php://output');
    } catch (Exception $th) {
      $this->session->set_flashdata('error', $th->getMessage());
      redirect_back();
    }
  }
  public function print($id, $status)
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
        $data['_terlantars'] = $this->Terlantar->filter(null, null, null, null, null, $params);
        $this->load->view("admin/laporan_orang_terlantar/$status/print", $data);
      } else {
        throw new Exception("<p>Gagal Memprint Laporan Orang Terlantar</p>");
      }
    } catch (Exception $th) {
      show_error($th->getMessage());
    }
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
