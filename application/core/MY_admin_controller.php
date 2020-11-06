<?php

class MY_admin_controller extends CI_Controller{
  public function __construct() {
    parent::__construct();
    if(!isset($this->session->admin_username)){
      show_error('Unauthorized');
    }
    $this->load->model('admin_model','Admin');
    $this->admin = $this->Admin->get_admin($this->session->admin_id);
  }

  protected function method()
  {
    return $_SERVER['REQUEST_METHOD'];
  }

  protected function isNotSuperAdmin(){
    if(!$this->session->isSuperAdmin){
      show_error('Unauthorized');
    }
  }

  protected function datatable_data($model,$except = NULL)
  {
    $search = $_POST['search']['value']; // Ambil data yang di ketik user pada textbox pencarian
    $limit = $_POST['length']; // Ambil data limit per page
    $start = $_POST['start']; // Ambil data start
    $order_index = $_POST['order'][0]['column']; // Untuk mengambil index yg menjadi acuan untuk sorting
    $order_field = $_POST['columns'][$order_index]['data']; // Untuk mengambil nama field yg menjadi acuan untuk sorting
    $order_ascdesc = $_POST['order'][0]['dir']; // Untuk menentukan order by "ASC" atau "DESC"
    if($except != null){
      $sql_total = $model->count_all($except); // Panggil fungsi count_all pada Admin
      $sql_data = $model->filter($search, $limit, $start, $order_field, $order_ascdesc,$except); // Panggil fungsi filter pada Admin
      $sql_filter = $model->count_filter($search,$except); // Panggil fungsi count_filter pada Admin
    }else{
      $sql_total = $model->count_all(); // Panggil fungsi count_all pada Admin
      $sql_data = $model->filter($search, $limit, $start, $order_field, $order_ascdesc); // Panggil fungsi filter pada Admin
      $sql_filter = $model->count_filter($search); // Panggil fungsi count_filter pada Admin
    }
    $callback = [
        'draw'=>$_POST['draw'], // Ini dari datatablenya
        'recordsTotal'=>$sql_total,
        'recordsFiltered'=>$sql_filter,
        'data'=>$sql_data
    ];
    header('Content-Type: application/json');
    echo json_encode($callback); // Convert array $callback ke json
  }
}