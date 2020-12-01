<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tutorial extends CI_Controller
{
  public function index()
  {
    $data['_view'] = 'tutorial';
    $data['_title'] = 'Tutorial';
    $this->load->view('layout', $data);
  }
}
