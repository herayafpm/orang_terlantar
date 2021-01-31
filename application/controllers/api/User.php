<?php

class User extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
  }
  public function index()
  {
    $this->load->model('user_model', 'User');
    try {
      $method = $_SERVER['REQUEST_METHOD'];
      if ($method == 'POST') {
        $nik = htmlspecialchars(strtolower($this->input->post('nik')));
        $user = $this->User->get_user_by_nik($nik);
        header('Content-Type: application/json');
        if ($user['user_status'] == 2) {
          echo json_encode($user);
        } else {
          return null;
        }
      } else {
        throw new Exception("Halaman tidak ditemukkan");
      }
    } catch (Exception $th) {
      show_error($th->getMessage());
    }
  }
}
