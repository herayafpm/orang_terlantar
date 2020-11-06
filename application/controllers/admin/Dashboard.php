<?php

class Dashboard extends MY_admin_controller
{
  public function __construct() {
    parent::__construct();
  }
  public function index()
  {
    $data['_view'] = 'admin/dashboard';
    $data['_title'] = 'Dashboard';
    $this->load->view('admin/layout',$data);
  }
}