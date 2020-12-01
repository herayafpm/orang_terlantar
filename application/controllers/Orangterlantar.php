<?php

class Orangterlantar extends CI_Controller
{

  public function cari()
  {
    $data['_view'] = 'orang_terlantar/cari';
    $data['_title'] = 'Cari Orang Terlantar';
    $data['_terlantars'] = [];
    if (isset($_POST['kirim'])) {
      try {
        $this->load->model('terlantar_model', 'Terlantar');
        $search = htmlspecialchars($this->input->post('search'));
        $terlantars = $this->Terlantar->get_search_terlantar($search);
        if ($terlantars) {
          $data['_terlantars'] = $terlantars;
        } else {
          throw new Exception("Orang Terlantar tidak ditemukan");
        }
      } catch (Exception $th) {
        $this->session->set_flashdata('error', $th->getMessage());
        redirect_back();
      }
    }
    $this->load->view('layout', $data);
  }
}
