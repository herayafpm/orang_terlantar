<?php

class MY_user_controller extends CI_Controller{
  public function __construct() {
    parent::__construct();
    if(!isset($this->session->user_nik)){
      show_error('Unauthorized');
    }
    $this->load->model('user_model','User');
    $this->user = $this->User->get_user($this->session->user_id);
  }
}