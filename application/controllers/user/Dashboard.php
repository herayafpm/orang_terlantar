<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_user_controller {
	public function index()
	{
    $data['_view'] = 'user/dashboard';
    $data['_title'] = 'Dashboard';
		$this->load->view('layout',$data);
	}
}
