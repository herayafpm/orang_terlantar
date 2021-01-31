<?php

class Seeder extends CI_Controller
{

  public function index()
  {
    // redirect('/');
    // Tempat Tinggal
    $this->load->model('tempat_tinggal_model', 'TempatTinggal');
    $this->TempatTinggal->seed();
    // Kondisi Tempat Tinggal
    $this->load->model('kondisi_tempat_tinggal_model', 'KondisiTempatTinggal');
    $this->KondisiTempatTinggal->seed();
    // Agama
    $this->load->model('agama_model', 'Agama');
    $this->Agama->seed();
    // Admin
    $this->load->model('admin_model', 'Admin');
    $this->Admin->seed();
    // FasilitasKesehatan
    $this->load->model('fasilitas_kesehatan_model', 'FasilitasKesehatan');
    $this->FasilitasKesehatan->seed();
    // Sumber Dana
    $this->load->model('sumber_dana_model', 'SumberDana');
    $this->SumberDana->seed();
    // Bansos
    $this->load->model('bansos_model', 'Bansos');
    $this->Bansos->seed();
    // KategoriOt
    $this->load->model('kategori_ot_model', 'KategoriOt');
    $this->KategoriOt->seed();
    // KondisiOt
    $this->load->model('kondisi_ot_model', 'KondisiOt');
    $this->KondisiOt->seed();
    // KebutuhanDiperlukan
    $this->load->model('kebutuhan_diperlukan_model', 'KebutuhanDiperlukan');
    $this->KebutuhanDiperlukan->seed();
    // OrangTerlantar
    $this->load->model('orang_terlantar_model', 'OrangTerlantar');
    $this->OrangTerlantar->seed();
    // // User
    // $this->load->model('user_model', 'User');
    // $this->User->seed();
    // // Terlantar
    // $this->load->model('terlantar_model', 'Terlantar');
    // $this->Terlantar->seed();
  }
}
