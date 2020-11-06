<?php
class Orangterlantar extends MY_admin_controller
{
  public function __construct(){
    parent::__construct();
    $this->isNotSuperAdmin();
    $this->load->model('orang_terlantar_model','OrangTerlantar');
  }

  public function index()
  {
    $data['_view'] = 'admin/master/orang_terlantar/index';
    $data['_title'] = 'Orang Terlantar';
    $data['_datatable'] = true;
    $data['_datatable_view'] = 'admin/master/orang_terlantar/datatables';
    $this->load->view('admin/layout',$data);
  }
  public function datatables(){
    try {
      $method = $_SERVER['REQUEST_METHOD'];
      if($method == 'POST'){
        $this->datatable_data($this->OrangTerlantar);
      }else{
        throw new Exception("Halaman tidak ditemukkan");
      }
    } catch (Exception $th) {
      show_error($th->getMessage());
    }
  }
  public function add()
  {
    try {
      $data['_view'] = 'admin/master/orang_terlantar/add';
      $data['_title'] = 'Tambah Orang Terlantar ';
      if(isset($_POST['simpan'])){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('orang_terlantar_nama','Nama Orang Terlantar','required');
        $this->form_validation->set_message('required', '{field} tidak boleh kosong');
        if($this->form_validation->run())     
        {   
          $params = [
            'orang_terlantar_nama' => htmlspecialchars($this->input->post('orang_terlantar_nama')),
          ];
          $this->OrangTerlantar->add_orang_terlantar($params);
          $this->session->set_flashdata('success',"Berhasil menambah Orang Terlantar ".$params['orang_terlantar_nama']);
          redirect('admin/master/orang_terlantar/index');
        }
        else
        {
          $this->session->set_flashdata('error','Validasi Error');
          $this->load->view('admin/layout',$data);
        }
      }else{
        $this->load->view('admin/layout',$data);
      }
    } catch (Exception $th) {
      show_error($th->getMessage());
    }
  }
  public function edit($id)
  {
    try {
      $orang_terlantar = $this->OrangTerlantar->get_orang_terlantar($id);
      $data['_view'] = 'admin/master/orang_terlantar/edit';
      $data['_title'] = 'Edit Orang Terlantar '.$orang_terlantar['orang_terlantar_nama'];
      $data['_orang_terlantar'] = $orang_terlantar;
      if(isset($_POST['simpan'])){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('orang_terlantar_nama','Nama Orang Terlantar','required');
        $this->form_validation->set_message('required', '{field} tidak boleh kosong');
        if($this->form_validation->run())     
        {   
          $params = [
            'orang_terlantar_nama' => htmlspecialchars($this->input->post('orang_terlantar_nama')),
          ];
          $this->OrangTerlantar->update_orang_terlantar($id,$params);
          $this->session->set_flashdata('success','Orang Terlantar '.$orang_terlantar['orang_terlantar_nama']." Berhasil diubah menjadi Orang Terlantar ".$params['orang_terlantar_nama']);
          redirect('admin/master/orang_terlantar/index');
        }
        else
        {
          $this->session->set_flashdata('error','Validasi Error');
          $this->load->view('admin/layout',$data);
        }
      }else{
        $this->load->view('admin/layout',$data);
      }
    } catch (Exception $th) {
      show_error($th->getMessage());
    }
  }
  public function delete($id)
  {
    try {
      $method = $_SERVER['REQUEST_METHOD'];
      if($method == 'POST'){
        $orang_terlantar = $this->OrangTerlantar->get_orang_terlantar($id);
        if($orang_terlantar){
          $delete = $this->OrangTerlantar->delete_orang_terlantar($id);
          if($delete){
            $this->session->set_flashdata('success','Orang Terlantar '.$orang_terlantar['orang_terlantar_nama']." berhasil dihapus");
          }else{
            $this->session->set_flashdata('error','Orang Terlantar '.$orang_terlantar['orang_terlantar_nama']." gagal dihapus");
          }
          redirect('admin/master/orang_terlantar/index');
        }else{
          throw new Exception('Orang Terlantar tidak ditemukan');
        }
      }else{
        throw new Exception('Halaman tidak ditemukan');
      }
    } catch (Exception $th) {
      show_error($th->getMessage());
    }
  }
}