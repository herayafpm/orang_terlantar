<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */

class User_model extends CI_Model
{
  protected $table = 'user';
  protected $user_nama = 'user_nama';
  protected $defaultPass = '123456';
  function __construct()
  {
    parent::__construct();
  }

  public function filter($search, $limit, $start, $order_field, $order_ascdesc, $params = [])
  {
    $this->db->select('user.*');
    $this->db->select('admin.admin_nama');
    $this->db->from($this->table);
    $this->db->join('admin', 'admin.admin_id = user.verif_by', 'LEFT');
    $this->db->order_by($order_field, $order_ascdesc); // Untuk menambahkan query ORDER BY
    $this->db->limit($limit, $start); // Untuk menambahkan query LIMIT
    if (isset($params['where_not_in'])) {
      $this->db->where_not_in($params['where_not_in']);
    }
    if (isset($params['where'])) {
      $this->db->where($params['where']);
    }
    if (isset($params['like'])) {
      foreach ($params['like'] as $key => $value) {
        $this->db->like($key, $value);
      }
    }
    $datas = $this->db->get()->result_array();
    return $datas; // Eksekusi query sql sesuai kondisi diatas
  }
  public function count_all($params = [])
  {
    if (isset($params['where_not_in'])) {
      $this->db->where_not_in($params['where_not_in']);
    }
    if (isset($params['where'])) {
      $this->db->where($params['where']);
    }
    $this->db->from($this->table);
    return $this->db->get()->num_rows();
  }
  public function count_filter($search, $params = [])
  {
    $this->db->from($this->table);
    if (isset($params['where'])) {
      $this->db->where($params['where']);
    }
    if (isset($params['where_not_in'])) {
      $this->db->where_not_in($params['where_not_in']);
    }
    if (isset($params['like'])) {
      foreach ($params['like'] as $key => $value) {
        $this->db->like($key, $value);
      }
    }
    return $this->db->get()->num_rows(); // Untuk menghitung jumlah data sesuai dengan filter pada textbox pencarian
  }
  public function get_distinct_user($field)
  {
    $this->db->select("{$field} as nama");
    $this->db->distinct($field);
    $this->db->from($this->table);
    return $this->db->get()->result_array();
  }
  /*
     * Get user by user_id
     */
  function get_user($user_id)
  {
    return $this->db->get_where($this->table, array('user_id' => $user_id))->row_array();
  }
  function get_user_by_nik($user_nik)
  {
    return $this->db->get_where($this->table, array('user_nik' => $user_nik))->row_array();
  }
  function get_user_detail($user_id = NULL, $where = NULL)
  {
    $this->db->select('user.*');
    $this->db->select('admin.admin_nama');
    $this->db->from($this->table);
    $this->db->join('admin', 'admin.admin_id = user.verif_by', 'LEFT');
    if ($user_id != null) {
      $this->db->where(['user.user_id' => $user_id]);
      return $this->db->get()->row_array();
    } else {
      if ($where != null) {
        $this->db->where($where);
      }
      return $this->db->get()->result_array();
    }
  }

  /*
     * Get all user count
     */
  function get_all_user_count()
  {
    $this->db->from($this->table);
    return $this->db->count_all_results();
  }

  /*
     * Get all user
     */
  function get_all_user($params = [])
  {
    $this->db->order_by('user_id', 'desc');
    if (isset($params) && !empty($params)) {
      $this->db->limit($params['limit'], $params['offset']);
    }
    return $this->db->get($this->table)->result_array();
  }

  /*
     * function to add new user
     */
  function add_user($params)
  {
    $params['created_at'] = date('Y-m-d H:i:s');
    $params['updated_at'] = date('Y-m-d H:i:s');
    if (isset($params['user_password'])) {
      $params['user_password'] = password_hash($params['user_password'], PASSWORD_DEFAULT);
    } else {
      $params['user_password'] = password_hash($this->defaultPass, PASSWORD_DEFAULT);
    }
    $params['user_tanggal_lahir'] = date('Y-m-d', strtotime($params['user_tanggal_lahir']));
    $this->db->insert($this->table, $params);
    return $this->db->insert_id();
  }

  /*
     * function to update user
     */
  function update_user($user_id, $params)
  {
    $params['updated_at'] = date('Y-m-d H:i:s');
    if (isset($params['user_password'])) {
      $params['user_password'] = password_hash($params['user_password'], PASSWORD_DEFAULT);
    }
    $this->db->where('user_id', $user_id);
    return $this->db->update($this->table, $params);
  }

  function set_login_user($user_id)
  {
    $params['last_login'] = date('Y-m-d H:i:s');
    $this->db->where('user_id', $user_id);
    return $this->db->update($this->table, $params);
  }
  public function is_using($kolom, $id)
  {
    $data = $this->db->get_where($this->table, array($kolom => $id))->row_array();
    if ($data) {
      return true;
    } else {
      return false;
    }
  }

  /*
     * function to delete user
     */
  function delete_user($user_id)
  {
    return $this->db->delete($this->table, array('user_id' => $user_id));
  }
  function authenticate($params)
  {
    if (empty($params['user_nik']) || empty($params['user_password'])) {
      return false;
    }
    $user = $this->db->get_where($this->table, ['user_nik' => $params['user_nik']])->row_array();
    if ($user) {
      if (password_verify($params['user_password'], $user['user_password'])) {
        if ($user['user_status'] == 1) {
          $this->set_login_user($user['user_id']);
        }
        return $user;
      } else {
        return false;
      }
    }
    return false;
  }
  function seed()
  {
    $nama = [
      'Abyasa', 'Ade', 'Adhiarja', 'Adiarja', 'Adika', 'Adikara', 'Adinata',
      'Aditya', 'Agus', 'Ajiman', 'Ajimat', 'Ajimin', 'Ajiono', 'Akarsana',
      'Alambana', 'Among', 'Anggabaya', 'Anom', 'Argono', 'Aris', 'Arta',
      'Artanto', 'Artawan', 'Arsipatra', 'Asirwada', 'Asirwanda', 'Aslijan',
      'Asmadi', 'Asman', 'Asmianto', 'Asmuni', 'Aswani', 'Atma', 'Atmaja',
      'Bagas', 'Bagiya', 'Bagus', 'Bagya', 'Bahuraksa', 'Bahuwarna',
      'Bahuwirya', 'Bajragin', 'Bakda', 'Bakiadi', 'Bakianto', 'Bakidin',
      'Bakijan', 'Bakiman', 'Bakiono', 'Bakti', 'Baktiadi', 'Baktianto',
      'Baktiono', 'Bala', 'Balamantri', 'Balangga', 'Balapati', 'Balidin',
      'Balijan', 'Bambang', 'Banara', 'Banawa', 'Banawi', 'Bancar', 'Budi',
      'Cagak', 'Cager', 'Cahyadi', 'Cahyanto', 'Cahya', 'Cahyo', 'Cahyono',
      'Caket', 'Cakrabirawa', 'Cakrabuana', 'Cakrajiya', 'Cakrawala',
      'Cakrawangsa', 'Candra', 'Chandra', 'Candrakanta', 'Capa', 'Caraka',
      'Carub', 'Catur', 'Caturangga', 'Cawisadi', 'Cawisono', 'Cawuk',
      'Cayadi', 'Cecep', 'Cemani', 'Cemeti', 'Cemplunk', 'Cengkal', 'Cengkir',
      'Dacin', 'Dadap', 'Dadi', 'Dagel', 'Daliman', 'Dalimin', 'Daliono',
      'Damar', 'Damu', 'Danang', 'Daniswara', 'Danu', 'Danuja', 'Dariati',
      'Darijan', 'Darimin', 'Darmaji', 'Darman', 'Darmana', 'Darmanto',
      'Darsirah', 'Dartono', 'Daru', 'Daruna', 'Daryani', 'Dasa', 'Digdaya',
      'Dimas', 'Dimaz', 'Dipa', 'Dirja', 'Drajat', 'Dwi', 'Dono', 'Dodo',
      'Edi', 'Eka', 'Elon', 'Eluh', 'Eman', 'Emas', 'Embuh', 'Emong',
      'Empluk', 'Endra', 'Enteng', 'Estiawan', 'Estiono', 'Eko', 'Edi',
      'Edison', 'Edward', 'Elvin', 'Erik', 'Emil', 'Ega', 'Emin', 'Eja',
      'Gada', 'Gadang', 'Gaduh', 'Gaiman', 'Galak', 'Galang', 'Galar',
      'Galih', 'Galiono', 'Galuh', 'Galur', 'Gaman', 'Gamani', 'Gamanto',
      'Gambira', 'Gamblang', 'Ganda', 'Gandewa', 'Gandi', 'Gandi', 'Ganep',
      'Gangsa', 'Gangsar', 'Ganjaran', 'Gantar', 'Gara', 'Garan', 'Garang',
      'Garda', 'Gatot', 'Gatra', 'Gilang', 'Galih', 'Ghani', 'Gading',
      'Hairyanto', 'Hardana', 'Hardi', 'Harimurti', 'Harja', 'Harjasa',
      'Harjaya', 'Harjo', 'Harsana', 'Harsanto', 'Harsaya', 'Hartaka',
      'Hartana', 'Harto', 'Hasta', 'Heru', 'Himawan', 'Hadi', 'Halim',
      'Hasim', 'Hasan', 'Hendra', 'Hendri', 'Heryanto', 'Hamzah', 'Hari',
      'Imam', 'Indra', 'Irwan', 'Irsad', 'Ikhsan', 'Irfan', 'Ian', 'Ibrahim',
      'Ibrani', 'Ismail', 'Irnanto', 'Ilyas', 'Ibun', 'Ivan', 'Ikin', 'Ihsan',
      'Jabal', 'Jaeman', 'Jaga', 'Jagapati', 'Jagaraga', 'Jail', 'Jaiman',
      'Jaka', 'Jarwa', 'Jarwadi', 'Jarwi', 'Jasmani', 'Jaswadi', 'Jati',
      'Jatmiko', 'Jaya', 'Jayadi', 'Jayeng', 'Jinawi', 'Jindra', 'Joko',
      'Jumadi', 'Jumari', 'Jamal', 'Jamil', 'Jais', 'Jefri', 'Johan', 'Jono',
      'Kacung', 'Kajen', 'Kambali', 'Kamidin', 'Kariman', 'Karja', 'Karma',
      'Karman', 'Karna', 'Karsa', 'Karsana', 'Karta', 'Kasiran', 'Kasusra',
      'Kawaca', 'Kawaya', 'Kayun', 'Kemba', 'Kenari', 'Kenes', 'Kuncara',
      'Kunthara', 'Kusuma', 'Kadir', 'Kala', 'Kalim', 'Kurnia', 'Kanda',
      'Kardi', 'Karya', 'Kasim', 'Kairav', 'Kenzie', 'Kemal', 'Kamal', 'Koko',
      'Labuh', 'Laksana', 'Lamar', 'Lanang', 'Langgeng', 'Lanjar', 'Lantar',
      'Lega', 'Legawa', 'Lembah', 'Liman', 'Limar', 'Luhung', 'Lukita',
      'Luluh', 'Lulut', 'Lurhur', 'Luwar', 'Luwes', 'Latif', 'Lasmanto',
      'Lukman', 'Luthfi', 'Leo', 'Luis', 'Lutfan', 'Lasmono', 'Laswi',
      'Mahesa', 'Makara', 'Makuta', 'Manah', 'Maras', 'Margana', 'Mariadi',
      'Marsudi', 'Martaka', 'Martana', 'Martani', 'Marwata', 'Maryadi',
      'Maryanto', 'Mitra', 'Mujur', 'Mulya', 'Mulyanto', 'Mulyono', 'Mumpuni',
      'Muni', 'Mursita', 'Murti', 'Mustika', 'Maman', 'Mahmud', 'Mahdi',
      'Mahfud', 'Malik', 'Muhammad', 'Mustofa', 'Marsito', 'Mursinin',
      'Nalar', 'Naradi', 'Nardi', 'Niyaga', 'Nrima', 'Nugraha', 'Nyana',
      'Narji', 'Nasab', 'Nasrullah', 'Nasim', 'Najib', 'Najam', 'Nyoman',
      'Olga', 'Ozy', 'Omar', 'Opan', 'Oskar', 'Oman', 'Okto', 'Okta', 'Opung',
      'Paiman', 'Panca', 'Pangeran', 'Pangestu', 'Pardi', 'Parman', 'Perkasa',
      'Praba', 'Prabu', 'Prabawa', 'Prabowo', 'Prakosa', 'Pranata', 'Pranawa',
      'Prasetya', 'Prasetyo', 'Prayitna', 'Prayoga', 'Prayogo', 'Purwadi',
      'Purwa', 'Purwanto', 'Panji', 'Pandu', 'Paiman', 'Prima', 'Putu',
      'Raden', 'Raditya', 'Raharja', 'Rama', 'Rangga', 'Reksa', 'Respati',
      'Rusman', 'Rosman', 'Rahmat', 'Rahman', 'Rendy', 'Reza', 'Rizki',
      'Ridwan', 'Rudi', 'Raden', 'Radit', 'Radika', 'Rafi', 'Rafid', 'Raihan',
      'Salman', 'Saadat', 'Saiful', 'Surya', 'Slamet', 'Samsul', 'Soleh',
      'Simon', 'Sabar', 'Sabri', 'Sidiq', 'Satya', 'Setya', 'Saka', 'Sakti',
      'Taswir', 'Tedi', 'Teddy', 'Taufan', 'Taufik', 'Tomi', 'Tasnim',
      'Teguh', 'Tasdik', 'Timbul', 'Tirta', 'Tirtayasa', 'Tri', 'Tugiman',
      'Umar', 'Usman', 'Uda', 'Umay', 'Unggul', 'Utama', 'Umaya', 'Upik',
      'Viktor', 'Vino', 'Vinsen', 'Vero', 'Vega', 'Viman', 'Virman',
      'Wahyu', 'Wira', 'Wisnu', 'Wadi', 'Wardi', 'Warji', 'Waluyo', 'Wakiman',
      'Wage', 'Wardaya', 'Warsa', 'Warsita', 'Warta', 'Wasis', 'Wawan',
      'Xanana', 'Yahya', 'Yusuf', 'Yosef', 'Yono', 'Yoga',
    ];
    $desa = ['ajibarang kulon', 'ajibarang wetan', 'banjarkulon', 'banjarmangu', 'gripit', 'ampelsari', 'bakal', 'batur', 'bandingan', 'bawang', 'pucang'];
    $kabupaten = ["banjarnegara", 'banyumas', 'kebumen', 'batang', 'blora', 'boyolali', 'brebes', 'purwodadi', 'jepara'];
    $kecamatan = ['banjarmangu', 'banjarnegara', 'batur', 'bawang', 'kalibening', 'karangkobar', 'ajibarang', 'banyumas', 'baturaden', 'cilongok', 'purwokerto barat', 'purwokerto selatan', 'purwokerto timur'];
    $jenis = ["PRIA", 'WANITA'];
    $data = [];
    $start = strtotime("2020-01-01");
    for ($i = 1; $i <= 100; $i++) {
      $at = date("Y-m-d H:i:s", mt_rand($start, time()));
      array_push($data, [
        "user_nama" => strtoupper($nama[rand(0, sizeof($nama) - 1)]),
        "user_nik" => 3304110701000000 + $i,
        "user_tempat_lahir" => strtoupper($kabupaten[rand(0, sizeof($kabupaten) - 1)]),
        "user_tanggal_lahir" => date('Y-m-d', mt_rand(1, time())),
        "user_jk" => $jenis[rand(0, sizeof($jenis) - 1)],
        "desa" => strtoupper($desa[rand(0, sizeof($desa) - 1)]),
        "rt" => strtoupper(rand(0, 99)),
        "rw" => strtoupper(rand(0, 99)),
        "kecamatan" => strtoupper($kecamatan[rand(0, sizeof($kecamatan) - 1)]),
        "kabupaten" => strtoupper($kabupaten[rand(0, sizeof($kabupaten) - 1)]),
        "provinsi" => strtoupper("jawa tengah"),
        "user_telepon" => "0895378036526",
        "user_status" => rand(0, 1),
        "user_password" => password_hash($this->defaultPass, PASSWORD_DEFAULT),
        "created_at"  => $at,
        "updated_at"  => $at,
      ]);
    }
    $this->db->insert_batch($this->table, $data);
  }
}