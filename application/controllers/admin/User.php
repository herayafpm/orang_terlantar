<?php

class User extends MY_admin_controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('user_model', 'User');
  }
  public function data($status)
  {
    $data['_view'] = 'admin/user/index';
    $data['_title'] = 'Data User';
    if ($status == 0) {
      $data['_title'] = $data['_title'] . " Belum Diverifikasi";
    } else if ($status == 1) {
      $data['_title'] = $data['_title'] . " Sudah Diverifikasi";
    } else {
      $data['_title'] = $data['_title'] . " Ditolak";
    }
    $data['_datatable'] = true;
    $data['_datatable_view'] = 'admin/user/datatables';
    $data['_datatable_scroll_y'] = "400px";
    $data['_admin'] = $this->admin;
    $data['_status'] = $status;
    $data['_desas'] = json_encode($this->User->get_distinct_user('desa'));
    $data['_kecamatans'] = json_encode($this->User->get_distinct_user('kecamatan'));
    $data['_kabupatens'] = json_encode($this->User->get_distinct_user('kabupaten'));
    $data = array_merge($data, $this->data);

    $this->load->view('admin/template', $data);
  }
  public function datatables($status)
  {
    try {
      $method = $_SERVER['REQUEST_METHOD'];
      if ($method == 'POST') {
        $where = ['user_status' => $status];
        $like = null;
        if (!empty($_POST['desa'])) {
          $where['desa'] = htmlspecialchars($_POST['desa']);
        }
        if (!empty($_POST['kecamatan'])) {
          $where['kecamatan'] = htmlspecialchars($_POST['kecamatan']);
        }
        if (!empty($_POST['kabupaten'])) {
          $where['kabupaten'] = htmlspecialchars($_POST['kabupaten']);
        }
        if (!empty($_POST['date'])) {
          $date = explode('/', htmlspecialchars($_POST['date']));
          $where['user.created_at >='] = $date[0] . " 00:00:00";
          $where['user.created_at <='] = $date[1] . " 23:59:59";
        }
        if (!empty($_POST['nama'])) {
          $like['user_nama'] = htmlspecialchars($_POST['nama']);
        }
        if (!empty($_POST['nik'])) {
          $like['user_nik'] = htmlspecialchars($_POST['nik']);
        }
        $params['where'] = $where;
        $params['like'] = $like;
        $this->datatable_where($this->User, $params);
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
  public function verif($id)
  {
    try {
      if ($_SERVER['REQUEST_METHOD'] != "POST") {
        throw new Exception("Halaman tidak ditemukkan");
      }
      if ($id != null) {
        $user = $this->User->get_user($id);
        if ($user) {
          if (isset($_POST['batal'])) {
            $params['user_status'] = 0;
            $params['verif_by'] = null;
            $params['verif_at'] = null;
            $update = $this->User->update_user($id, $params);
            if ($update) {
              $this->session->set_flashdata('success', 'user ' . $user['user_nama'] . " Berhasil dibatalkan status verifikasinya");
            } else {
              $this->session->set_flashdata('error', 'user ' . $user['user_nama'] . " Gagal dibatalkan status verifikasinya");
            }
          } else {
            $params['user_status'] = 1;
            $params['verif_by'] = $this->admin['admin_id'];
            $params['verif_at'] = date('Y-m-d H:i:s');
            $update = $this->User->update_user($id, $params);
            if ($update) {
              $this->session->set_flashdata('success', 'user ' . $user['user_nama'] . " Berhasil diverifikasi");
            } else {
              $this->session->set_flashdata('error', 'user ' . $user['user_nama'] . " Gagal diverifikasi");
            }
          }
          redirect_back();
        } else {
          throw new Exception('user tidak ditemukan');
        }
      } else {
        throw new Exception('Halaman tidak ditemukan');
      }
    } catch (Exception $th) {
      $this->session->set_flashdata('error', $th->getMessage());
      redirect_back();
    }
  }
  public function log($id)
  {
    try {
      if ($id != null) {
        $user = $this->User->get_user($id);
        if ($user) {
          $data['_view'] = 'admin/user/log';
          $data['_title'] = 'Catatan Login User ' . $user['user_nama'];
          $data['_user'] = $user;
          $data = array_merge($data, $this->data);
          $data['_datatable'] = true;
          $data['_datatable_view'] = 'admin/user/log_datatables';
          $this->load->view('admin/template', $data);
        } else {
          throw new Exception('user tidak ditemukan');
        }
      } else {
        throw new Exception('Halaman tidak ditemukan');
      }
    } catch (Exception $th) {
      $this->session->set_flashdata('error', $th->getMessage());
      redirect_back();
    }
  }
  public function logdatatables($id = NULL)
  {
    try {
      $method = $_SERVER['REQUEST_METHOD'];
      if ($method == 'POST') {
        $this->load->model('login_user_model', 'LoginUser');
        $this->datatable_log($this->LoginUser, ['user_id' => $id]);
      } else {
        throw new Exception("Halaman tidak ditemukkan");
      }
    } catch (Exception $th) {
      show_error($th->getMessage());
    }
  }
  public function tolak($id)
  {
    try {
      $method = $_SERVER['REQUEST_METHOD'];
      if ($method == 'POST') {
        $user = $this->User->get_user($id);
        $this->load->model('terlantar_model', 'Terlantar');
        if ($this->Terlantar->is_using('user_daftar', $id)) {
          $this->session->set_flashdata('error', 'User ' . $user['user_nama'] . " masih digunakan, tidak bisa ditolak");
          redirect_back();
        }
        if ($user) {
          $params['verif_by'] = $this->admin['admin_id'];
          $params['verif_at'] = date('Y-m-d H:i:s');
          $update = $this->User->tolak_user($id, 2, $params);
          if ($update) {
            $this->session->set_flashdata('success', 'user ' . $user['user_nama'] . " berhasil ditolak");
          } else {
            $this->session->set_flashdata('error', 'user ' . $user['user_nama'] . " gagal ditolak");
          }
          redirect_back();
        } else {
          throw new Exception('user tidak ditemukan');
        }
      } else {
        throw new Exception('Halaman tidak ditemukan');
      }
    } catch (Exception $th) {
      $this->session->set_flashdata('error', $th->getMessage());
      redirect_back();
    }
  }
}
