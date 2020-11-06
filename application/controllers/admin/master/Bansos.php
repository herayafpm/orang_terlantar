<?php
class Bansos extends MY_admin_controller
{
  public function __construct(){
    parent::__construct();
    $this->isNotSuperAdmin();
    $this->load->model('bansos_model','Bansos');
  }

  public function index()
  {
    $data['_view'] = 'admin/master/bansos/index';
    $data['_title'] = 'Bantuan Sosial';
    $data['_datatable'] = true;
    $data['_datatable_view'] = 'admin/master/bansos/datatables';
    $this->load->view('admin/layout',$data);
  }
  public function datatables(){
    try {
      $method = $_SERVER['REQUEST_METHOD'];
      if($method == 'POST'){
        $this->datatable_data($this->Bansos);
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
      $data['_view'] = 'admin/master/bansos/add';
      $data['_title'] = 'Tambah Bantuan Sosial ';
      if(isset($_POST['simpan'])){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('bansos_nama','Nama Bantuan Sosial','required');
        $this->form_validation->set_message('required', '{field} tidak boleh kosong');
        if($this->form_validation->run())     
        {   
          $params = [
            'bansos_nama' => htmlspecialchars($this->input->post('bansos_nama')),
          ];
          $this->Bansos->add_bansos($params);
          $this->session->set_flashdata('success',"Berhasil menambah Bantuan Sosial ".$params['bansos_nama']);
          redirect('admin/master/bansos/index');
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
      $bansos = $this->Bansos->get_bansos($id);
      $data['_view'] = 'admin/master/bansos/edit';
      $data['_title'] = 'Edit Bantuan Sosial '.$bansos['bansos_nama'];
      $data['_bansos'] = $bansos;
      if(isset($_POST['simpan'])){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('bansos_nama','Nama Bantuan Sosial','required');
        $this->form_validation->set_message('required', '{field} tidak boleh kosong');
        if($this->form_validation->run())     
        {   
          $params = [
            'bansos_nama' => htmlspecialchars($this->input->post('bansos_nama')),
          ];
          $this->Bansos->update_bansos($id,$params);
          $this->session->set_flashdata('success','Bantuan Sosial '.$bansos['bansos_nama']." Berhasil diubah menjadi Bantuan Sosial ".$params['bansos_nama']);
          redirect('admin/master/bansos/index');
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
        $bansos = $this->Bansos->get_bansos($id);
        if($bansos){
          $delete = $this->Bansos->delete_bansos($id);
          if($delete){
            $this->session->set_flashdata('success','Bantuan Sosial '.$bansos['bansos_nama']." berhasil dihapus");
          }else{
            $this->session->set_flashdata('error','Bantuan Sosial '.$bansos['bansos_nama']." gagal dihapus");
          }
          redirect('admin/master/bansos/index');
        }else{
          throw new Exception('Bantuan Sosial tidak ditemukan');
        }
      }else{
        throw new Exception('Halaman tidak ditemukan');
      }
    } catch (Exception $th) {
      show_error($th->getMessage());
    }
  }
}