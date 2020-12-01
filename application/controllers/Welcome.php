<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (isset($this->session->admin_id)) {
			redirect('/admin/dashboard');
		}
	}
	public function index()
	{
		$data['_view'] = 'welcome';
		$data['_title'] = 'Beranda';
		$this->load->model('terlantar_model', 'Terlantar');
		$data['_terdaftar'] = $this->Terlantar->count_all();
		$this->load->model('terlantar_verif_model', 'TerlantarVerif');
		$data['_terverifikasi'] = $this->TerlantarVerif->count_all();
		$this->load->view('layout', $data);
	}
}
