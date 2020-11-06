<?php
class Agama extends MY_admin_controller
{
  public function __construct(){
    parent::__construct();
    $this->isNotSuperAdmin();
    $this->load->model('agama_model','Agama');
  }

  public function index()
  {
    $data['_view'] = 'admin/master/agama/index';
    $data['_title'] = 'Agama';
    $data['_datatable'] = true;
    $data['_datatable_view'] = 'admin/master/agama/datatables';
    $this->load->view('admin/layout',$data);
  }
  public function datatables(){
    try {
      $method = $_SERVER['REQUEST_METHOD'];
      if($method == 'POST'){
        $this->datatable_data($this->Agama);
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
      $data['_view'] = 'admin/master/agama/add';
      $data['_title'] = 'Tambah Agama ';
      if(isset($_POST['simpan'])){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('agama_nama','Nama Agama','required');
        $this->form_validation->set_message('required', '{field} tidak boleh kosong');
        if($this->form_validation->run())     
        {   
          $params = [
            'agama_nama' => htmlspecialchars($this->input->post('agama_nama')),
          ];
          $this->Agama->add_agama($params);
          $this->session->set_flashdata('success',"Berhasil menambah Agama ".$params['agama_nama']);
          redirect('admin/master/agama/index');
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
      $agama = $this->Agama->get_agama($id);
      $data['_view'] = 'admin/master/agama/edit';
      $data['_title'] = 'Edit Agama '.$agama['agama_nama'];
      $data['_agama'] = $agama;
      if(isset($_POST['simpan'])){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('agama_nama','Nama Agama','required');
        $this->form_validation->set_message('required', '{field} tidak boleh kosong');
        if($this->form_validation->run())     
        {   
          $params = [
            'agama_nama' => htmlspecialchars($this->input->post('agama_nama')),
          ];
          $this->Agama->update_agama($id,$params);
          $this->session->set_flashdata('success','Agama '.$agama['agama_nama']." Berhasil diubah menjadi Agama ".$params['agama_nama']);
          redirect('admin/master/agama/index');
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
        $agama = $this->Agama->get_agama($id);
        if($agama){
          $delete = $this->Agama->delete_agama($id);
          if($delete){
            $this->session->set_flashdata('success','Agama '.$agama['agama_nama']." berhasil dihapus");
          }else{
            $this->session->set_flashdata('error','Agama '.$agama['agama_nama']." gagal dihapus");
          }
          redirect('admin/master/agama/index');
        }else{
          throw new Exception('Agama tidak ditemukan');
        }
      }else{
        throw new Exception('Halaman tidak ditemukan');
      }
    } catch (Exception $th) {
      show_error($th->getMessage());
    }
  }
}