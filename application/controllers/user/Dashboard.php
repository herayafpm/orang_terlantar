<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_user_controller {
	public function index()
	{
    $data['_view'] = 'user/dashboard';
		$data['_title'] = 'Dashboard';
		$data['_datatable'] = true;
    $data['_datatable_view'] = 'user/orang_terlantar/datatables';
		$this->load->view('layout',$data);
	}
}
