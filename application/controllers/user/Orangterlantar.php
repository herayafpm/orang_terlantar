<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orangterlantar extends MY_user_controller {
  public function __construct(){
    parent::__construct();
    $this->load->model('terlantar_model','Terlantar');
  }
  public function datatables()
	{
		try {
      $method = $_SERVER['REQUEST_METHOD'];
      if($method == 'POST'){
        $this->datatable_data($this->Terlantar);
      }else{
        throw new Exception("Halaman tidak ditemukkan");
      }
    } catch (Exception $th) {
      show_error($th->getMessage());
    }
	}
	public function add()
	{
    $this->load->model('orang_terlantar_model','OrangTerlantar');
    $this->load->model('agama_model','Agama');
    $this->load->model('tempat_tinggal_model','TempatTinggal');
    $this->load->model('kondisi_tempat_tinggal_model','KondisiTempatTinggal');
    $this->load->model('kategori_ot_model','KategoriOt');
    $this->load->model('fasilitas_kesehatan_model','FasilitasKesehatan');
    $this->load->model('kondisi_ot_model','KondisiOt');
    $this->load->model('kebutuhan_diperlukan_model','KebutuhanDiperlukan');
    $data['_view'] = 'user/orang_terlantar/add';
    $data['_title'] = 'Daftar Orang Terlantar';
    $data['_orang_terlantars'] = $this->loopingSelect('orang_terlantar',$this->OrangTerlantar->get_all_orang_terlantar());
    $data['_agamas'] = $this->loopingSelect('agama',$this->Agama->get_all_agama());
    $data['_tempat_tinggals'] = $this->loopingSelect('tempat_tinggal',$this->TempatTinggal->get_all_tempat_tinggal());
    $data['_kondisi_tempat_tinggals'] = $this->loopingSelect('kondisi_tempat_tinggal',$this->KondisiTempatTinggal->get_all_kondisi_tempat_tinggal());
    $data['_kategori_ots'] = $this->loopingSelect('kategori_ot',$this->KategoriOt->get_all_kategori_ot());
    $data['_fasilitas_kesehatans'] = $this->loopingSelect('fasilitas_kesehatan',$this->FasilitasKesehatan->get_all_fasilitas_kesehatan());
    $data['_kondisi_ots'] = $this->loopingSelect('kondisi_ot',$this->KondisiOt->get_all_kondisi_ot());
    $data['_kebutuhan_diperlukans'] = $this->loopingSelect('kebutuhan_diperlukan',$this->KebutuhanDiperlukan->get_all_kebutuhan_diperlukan());
    $data['_jenis_kelamins'] = [
      [
        'id' => '1',
        'nama' => 'PRIA'
      ],
      [
        'id' => '2',
        'nama' => 'WANITA'
      ],
    ];
    if(isset($_POST['kirim'])){
      $this->load->library('form_validation');
      $this->form_validation->set_rules('orang_terlantar','Tipe Orang Terlantar','callback_validateSelect');
      $this->form_validation->set_rules('nama','Nama Orang Terlantar','required');
      $this->form_validation->set_rules('alamat','Alamat Jalan / Perumahan','required');
      if(isset($_POST['have_identitas'])){
        $this->form_validation->set_rules('nik','NIK Orang Terlantar','required|min_length[16]|max_length[16]');
        $this->form_validation->set_rules('no_kk','NO KK Orang Terlantar','required|min_length[16]|max_length[16]');
        $this->form_validation->set_rules('tempat_lahir','Tempat Lahir','required');
        $this->form_validation->set_rules('tanggal_lahir','Tanggal Lahir','required');
        $this->form_validation->set_rules('jenis_kelamin','Jenis Kelamin','callback_validateSelect');
        $this->form_validation->set_rules('agama','Agama','callback_validateSelect');
        $this->form_validation->set_rules('rt','RT','required');
        $this->form_validation->set_rules('rw','RW','required');
        $this->form_validation->set_rules('desa','Desa','required');
        $this->form_validation->set_rules('kecamatan','Kecamatan','required');
        $this->form_validation->set_rules('kabupaten','Kabupaten','required');
      }
      if(isset($_POST['orang_terlantar']) && $_POST['orang_terlantar'] == "2"){
        $this->form_validation->set_rules('tujuan_alamat','Alamat Tujuan Luar Daerah','required');
        $this->form_validation->set_rules('tujuan_rt','RT Tujuan Luar Daerah','required');
        $this->form_validation->set_rules('tujuan_rw','RW Tujuan Luar Daerah','required');
        $this->form_validation->set_rules('tujuan_desa','Desa Tujuan Luar Daerah','required');
        $this->form_validation->set_rules('tujuan_kecamatan','Kecamatan Tujuan Luar Daerah','required');
        $this->form_validation->set_rules('tujuan_kabupaten','Kabupaten Tujuan Luar Daerah','required');
        $this->form_validation->set_rules('tujuan_provinsi','Provinsi Tujuan Luar Daerah','required');
      }
      $this->form_validation->set_rules('tempat_tinggal','Tempat Tinggal','callback_validateSelect');
      $this->form_validation->set_rules('kondisi_tempat_tinggal','Kondisi Tempat Tinggal','callback_validateSelect');
      $this->form_validation->set_rules('kategori_ot','Kategori Orang Terlantar','callback_validateSelect');
      $this->form_validation->set_rules('fasilitas_kesehatan','Fasilitas Kesehatan','callback_validateSelect');
      $this->form_validation->set_rules('kondisi_ot','Kondisi Orang Terlantar','callback_validateSelect');
      $this->form_validation->set_rules('kebutuhan_diperlukan','Kebutuhan Yang Diperlukan','callback_validateSelect');
      $this->form_validation->set_rules('alasan_terlantar','Alasan Terlantar','required');
      $this->form_validation->set_message('required', '{field} tidak boleh kosong');
      $this->form_validation->set_message('min_length', '{field} harus sama dengan {param} karakter');
      $this->form_validation->set_message('max_length', '{field} harus sama dengan {param} karakter');
      $this->form_validation->set_message('validateSelect', 'harus pilih {field}');
      if($this->form_validation->run())     
      {
        try {
          $noUrut = $this->Terlantar->getNoUrut();
          $params = [
            'no_urut' => $noUrut,
            'orang_terlantar_id' => htmlspecialchars($this->input->post('orang_terlantar')),
            'identitas_kependudukan' => htmlspecialchars($this->input->post('have_identitas')),
            'foto' => $this->_do_upload('foto',$noUrut),
            'terlantar_nama' => htmlspecialchars(strtoupper($this->input->post('nama'))),
            'terlantar_alamat' => htmlspecialchars(strtoupper($this->input->post('alamat'))),
            'tempat_tinggal_id' => htmlspecialchars($this->input->post('tempat_tinggal')),
            'kondisi_tempat_tinggal_id' => htmlspecialchars($this->input->post('kondisi_tempat_tinggal')),
            'kategori_ot_id' => htmlspecialchars($this->input->post('kategori_ot')),
            'fasilitas_kesehatan_id' => htmlspecialchars($this->input->post('fasilitas_kesehatan')),
            'kondisi_ot_id' => htmlspecialchars($this->input->post('kondisi_ot')),
            'kebutuhan_diperlukan_id' => htmlspecialchars($this->input->post('kebutuhan_diperlukan')),
            'alasan_terlantar' => htmlspecialchars($this->input->post('alasan_terlantar')),
          ];
          $params['user_daftar'] = $this->session->user_id;
          if(isset($_POST['have_identitas'])){
            $params['terlantar_nik'] =  htmlspecialchars($this->input->post('nik'));
            $params['terlantar_no_kk'] =  htmlspecialchars($this->input->post('no_kk'));
            $params['terlantar_no_dtks'] =  htmlspecialchars($this->input->post('no_dtks'));
            $params['terlantar_tempat_lahir'] =  htmlspecialchars($this->input->post('tempat_lahir'));
            $params['terlantar_tanggal_lahir'] =  htmlspecialchars(date('Y-m-d',strtotime($this->input->post('tanggal_lahir'))));
            $params['terlantar_jenis_kelamin'] =  htmlspecialchars(strtoupper($this->input->post('terlantar_jenis_kelamin')));
            $params['agama_id'] =  htmlspecialchars($this->input->post('agama'));
            $params['terlantar_alamat'] =  htmlspecialchars(strtoupper($this->input->post('alamat')));
            $params['terlantar_rt'] =  htmlspecialchars(strtoupper($this->input->post('rt')));
            $params['terlantar_rw'] =  htmlspecialchars(strtoupper($this->input->post('rw')));
            $params['terlantar_desa'] =  htmlspecialchars(strtoupper($this->input->post('desa')));
            $params['terlantar_kecamatan'] =  htmlspecialchars(strtoupper($this->input->post('kecamatan')));
            $params['terlantar_kabupaten'] =  htmlspecialchars(strtoupper($this->input->post('kabupaten')));
            $params['terlantar_telp'] =  htmlspecialchars(strtoupper($this->input->post('no_telp')));
          }
          if(isset($_POST['orang_terlantar']) && $_POST['orang_terlantar'] == "2"){
            $params['tujuan_alamat'] =  htmlspecialchars(strtoupper($this->input->post('tujuan_alamat')));
            $params['tujuan_rt'] =  htmlspecialchars(strtoupper($this->input->post('tujuan_rt')));
            $params['tujuan_rw'] =  htmlspecialchars(strtoupper($this->input->post('tujuan_rw')));
            $params['tujuan_desa'] =  htmlspecialchars(strtoupper($this->input->post('tujuan_desa')));
            $params['tujuan_kecamatan'] =  htmlspecialchars(strtoupper($this->input->post('tujuan_kecamatan')));
            $params['tujuan_kabupaten'] =  htmlspecialchars(strtoupper($this->input->post('tujuan_kabupaten')));
            $params['tujuan_provinsi'] =  htmlspecialchars(strtoupper($this->input->post('tujuan_provinsi')));
          }
          if($this->Terlantar->add_terlantar($params) >= 1){
            $this->session->set_flashdata('success',"Berhasil mengirimkan data orang terlantar");
            redirect('user/dashboard');
          }else{
            $this->session->set_flashdata('error',$th->getMessage());
            $this->load->view('layout',$data);
          }

        } catch (Exception $th) {
          $this->session->set_flashdata('error',$th->getMessage());
          $this->load->view('layout',$data);
        }
      }
      else
      {
        $this->session->set_flashdata('error','Validasi Error');
        $this->load->view('layout',$data);
      }
    }else{
      $this->load->view('layout',$data);
    }
  }
  function validateSelect($str)
  {
    if($str != "0"){
      return true;
    }else{
      return false;
    }
  }
  private function loopingSelect($table,$datas)
  {
    $no = 0;
    $dataData = [];
    foreach ($datas as $data) {
      array_push($dataData,[
        'id' => $data[$table.'_id'],
        'nama' => $data[$table.'_nama'],
      ]);
    }
    return $dataData;
  }
  private function _do_upload($field_name,$fileName = null)
  {
    if($_FILES[$field_name]['type'] == ""){
      throw new Exception("Foto tidak boleh kosong");
    }
    $config['upload_path']          = './uploads/';
    $config['allowed_types']        = 'jpg|png|jpeg';
    $config['overwrite']            = true;
    $config['max_size']             = 2048;
    $fileType = explode("/",$_FILES[$field_name]['type']);
    if($fileName == null){
      $config['file_name'] = uniqid('file_').time().".".$fileType[1];
    }else{
      $config['file_name'] = $fileName.".".$fileType[1];
    }
    $this->load->library('upload', $config);
    if (!$this->upload->do_upload($field_name))
    {
      throw new Exception($this->upload->display_errors());
    }
    else
    {
      $file = $this->upload->data();
      return $file['file_name'];
    }
  }
  public function show($id)
  {
    try {
      $terlantar = $this->Terlantar->get_terlantar_detail($id);
      if($terlantar){
        $data['_view'] = 'user/orang_terlantar/show';
        $data['_title'] = 'Data Orang Terlantar '.$terlantar['terlantar_nama'];
        $data['_terlantar'] = $terlantar;
        $this->load->view('layout',$data);
      }else{
        throw new Exception('terlantar tidak ditemukan');
      }
    } catch (Exception $th) {
      $this->session->set_flashdata('error',$th->getMessage());
      redirect('user/dashboard');
    }
  }
  public function delete($id)
  {
    try {
      $method = $_SERVER['REQUEST_METHOD'];
      if($method == 'POST'){
        $terlantar = $this->Terlantar->get_terlantar($id);
        if($terlantar){
          if((bool) $terlantar['verif']){
            $this->session->set_flashdata('error','terlantar '.$terlantar['terlantar_nama']." sudah diverifikasi tidak bisa dihapus");
            redirect('user/dashboard');
          }else{
            $delete = $this->Terlantar->delete_terlantar($id);
            if($delete){
              if(file_exists("uploads/".$terlantar['foto'])){
                unlink("uploads/".$terlantar['foto']);
              }
              $this->session->set_flashdata('success','terlantar '.$terlantar['terlantar_nama']." berhasil dihapus");
            }else{
              $this->session->set_flashdata('error','terlantar '.$terlantar['terlantar_nama']." gagal dihapus");
            }
            redirect('user/dashboard');
          }
        }else{
          throw new Exception('terlantar tidak ditemukan');
        }
      }else{
        throw new Exception('Halaman tidak ditemukan');
      }
    } catch (Exception $th) {
      show_error($th->getMessage());
    }
  }
}
