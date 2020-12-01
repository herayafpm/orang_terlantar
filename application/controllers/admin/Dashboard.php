<?php

class Dashboard extends MY_admin_controller
{
  public function __construct()
  {
    parent::__construct();
  }
  public function index()
  {
    $data['_view'] = 'admin/dashboard';
    $data['_title'] = 'Dashboard';
    $data['_total_belum_verif'] = $this->Terlantar->count_all(['where' => ['proses_id' => null]]);
    $data['_total_verif'] = $this->Terlantar->count_all(['where' => ['verif_id !=' => null]]);
    $data['_total_tolak'] = $this->Terlantar->count_all(['where' => ['tolak_id !=' => null]]);
    $data = array_merge($data, $this->data);
    $this->load->view('admin/template', $data);
  }
}
