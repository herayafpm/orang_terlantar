<?php
class Kondisiot extends MY_admin_controller
{
  public function __construct(){
    parent::__construct();
    $this->isNotSuperAdmin();
    $this->load->model('kondisi_ot_model','KondisiOt');
  }

  public function index()
  {
    $data['_view'] = 'admin/master/kondisi_ot/index';
    $data['_title'] = 'Kondisi Orang Terlantar';
    $data['_datatable'] = true;
    $data['_datatable_view'] = 'admin/master/kondisi_ot/datatables';
    $this->load->view('admin/layout',$data);
  }
  public function datatables(){
    try {
      $method = $_SERVER['REQUEST_METHOD'];
      if($method == 'POST'){
        $this->datatable_data($this->KondisiOt);
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
      $data['_view'] = 'admin/master/kondisi_ot/add';
      $data['_title'] = 'Tambah Kondisi Orang Terlantar ';
      if(isset($_POST['simpan'])){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('kondisi_ot_nama','Nama Kondisi Orang Terlantar','required');
        $this->form_validation->set_message('required', '{field} tidak boleh kosong');
        if($this->form_validation->run())     
        {   
          $params = [
            'kondisi_ot_nama' => htmlspecialchars($this->input->post('kondisi_ot_nama')),
          ];
          $this->KondisiOt->add_kondisi_ot($params);
          $this->session->set_flashdata('success',"Berhasil menambah Kondisi Orang Terlantar ".$params['kondisi_ot_nama']);
          redirect('admin/master/kondisi_ot/index');
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
      $kondisi_ot = $this->KondisiOt->get_kondisi_ot($id);
      $data['_view'] = 'admin/master/kondisi_ot/edit';
      $data['_title'] = 'Edit Kondisi Orang Terlantar '.$kondisi_ot['kondisi_ot_nama'];
      $data['_kondisi_ot'] = $kondisi_ot;
      if(isset($_POST['simpan'])){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('kondisi_ot_nama','Nama Kondisi Orang Terlantar','required');
        $this->form_validation->set_message('required', '{field} tidak boleh kosong');
        if($this->form_validation->run())     
        {   
          $params = [
            'kondisi_ot_nama' => htmlspecialchars($this->input->post('kondisi_ot_nama')),
          ];
          $this->KondisiOt->update_kondisi_ot($id,$params);
          $this->session->set_flashdata('success','Kondisi Orang Terlantar '.$kondisi_ot['kondisi_ot_nama']." Berhasil diubah menjadi Kondisi Orang Terlantar ".$params['kondisi_ot_nama']);
          redirect('admin/master/kondisi_ot/index');
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
        $kondisi_ot = $this->KondisiOt->get_kondisi_ot($id);
        if($kondisi_ot){
          $delete = $this->KondisiOt->delete_kondisi_ot($id);
          if($delete){
            $this->session->set_flashdata('success','Kondisi Orang Terlantar '.$kondisi_ot['kondisi_ot_nama']." berhasil dihapus");
          }else{
            $this->session->set_flashdata('error','Kondisi Orang Terlantar '.$kondisi_ot['kondisi_ot_nama']." gagal dihapus");
          }
          redirect('admin/master/kondisi_ot/index');
        }else{
          throw new Exception('Kondisi Orang Terlantar tidak ditemukan');
        }
      }else{
        throw new Exception('Halaman tidak ditemukan');
      }
    } catch (Exception $th) {
      show_error($th->getMessage());
    }
  }
}