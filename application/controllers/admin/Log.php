<?php

class Log extends MY_admin_controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Login_admin_model', 'LoginAdmin');
  }
  public function index()
  {
    $data['_view'] = 'admin/log';
    $data['_title'] = "Catatan Login {$this->admin['admin_nama']}";
    $this->load->library('pagination');
    $limit = 10;
    $offset = $this->uri->segment(3) ?? 0;
    $data['_logins'] = $this->LoginAdmin->get_all_login_admin(['offset' => $offset, 'limit' => $limit, 'where' => ['admin_id' => $this->admin['admin_id']], 'order_by' => 'created_at', 'order_by_do' => 'DESC']);
    $data['_datatable'] = true;
    $data['_datatable_view'] = 'admin/log_datatables';
    $data = array_merge($data, $this->data);
    $this->load->view('admin/template', $data);
  }
  public function datatables()
  {
    try {
      $method = $_SERVER['REQUEST_METHOD'];
      if ($method == 'POST') {
        $this->datatable_log($this->LoginAdmin, ['admin_id' => $this->admin['admin_id']]);
      } else {
        throw new Exception("Halaman tidak ditemukkan");
      }
    } catch (Exception $th) {
      show_error($th->getMessage());
    }
  }
}
