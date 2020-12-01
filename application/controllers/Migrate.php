<?php

class Migrate extends CI_Controller
{

  public function index()
  {
    // redirect('/');
    $this->load->library('migration');
    if ($this->migration->latest() === FALSE) {
      show_error($this->migration->error_string());
    } else {
      redirect('/seeder');
    }
  }
}
