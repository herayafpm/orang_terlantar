<?php

class MY_user_controller extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    if (!isset($this->session->user_nik)) {
      show_error('Unauthorized');
    }
    $this->load->model('user_model', 'User');
    $this->user = $this->User->get_user($this->session->user_id);
  }
  protected function datatable_data($model, $params = [])
  {
    $where = ['where' => ['user_daftar' => $this->session->user_id]];
    $params = array_merge($params, $where);
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
