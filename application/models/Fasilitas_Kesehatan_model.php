<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Fasilitas_Kesehatan_model extends CI_Model
{
    protected $table = 'fasilitas_kesehatan';
    protected $fasilitas_kesehatan_nama = 'fasilitas_kesehatan_nama';
    function __construct()
    {
        parent::__construct();
    }
    
    public function filter($search, $limit, $start, $order_field, $order_ascdesc){
        $this->db->like($this->fasilitas_kesehatan_nama, $search); // Untuk menambahkan query where LIKE
        $this->db->order_by($order_field, $order_ascdesc); // Untuk menambahkan query ORDER BY
        $this->db->limit($limit, $start); // Untuk menambahkan query LIMIT
        return $this->db->get($this->table)->result_array(); // Eksekusi query sql sesuai kondisi diatas
    }
    public function count_all(){
        return $this->db->count_all($this->table); // Untuk menghitung semua data siswa
    }
    public function count_filter($search){
        $this->db->like($this->fasilitas_kesehatan_nama, $search); // Untuk menambahkan query where OR LIKE
        return $this->db->get($this->table)->num_rows(); // Untuk menghitung jumlah data sesuai dengan filter pada textbox pencarian
    }
    
    /*
     * Get fasilitas_kesehatan by fasilitas_kesehatan_id
     */
    function get_fasilitas_kesehatan($fasilitas_kesehatan_id)
    {
        return $this->db->get_where($this->table,array('fasilitas_kesehatan_id'=>$fasilitas_kesehatan_id))->row_array();
    }
    
    /*
     * Get all fasilitas_kesehatan count
     */
    function get_all_fasilitas_kesehatan_count()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
        
    /*
     * Get all fasilitas_kesehatan
     */
    function get_all_fasilitas_kesehatan($params = [])
    {
        $this->db->order_by('fasilitas_kesehatan_id', 'desc');
        if(isset($params) && !empty($params))
        {
          $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get($this->table)->result_array();
    }
        
    /*
     * function to add new fasilitas_kesehatan
     */
    function add_fasilitas_kesehatan($params)
    {
        $this->db->insert($this->table,$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update fasilitas_kesehatan
     */
    function update_fasilitas_kesehatan($fasilitas_kesehatan_id,$params)
    {
        $this->db->where('fasilitas_kesehatan_id',$fasilitas_kesehatan_id);
        return $this->db->update($this->table,$params);
    }
    
    /*
     * function to delete fasilitas_kesehatan
     */
    function delete_fasilitas_kesehatan($fasilitas_kesehatan_id)
    {
        return $this->db->delete($this->table,array('fasilitas_kesehatan_id'=>$fasilitas_kesehatan_id));
    }
    function seed()
    {
        $this->db->truncate($this->table);
        $data = [
            ["fasilitas_kesehatan_nama" => "BPJS PBI/KIS PEMERINTAH"],
            ["fasilitas_kesehatan_nama" => "BPJS MANDIRI"],
            ["fasilitas_kesehatan_nama" => "TIDAK PUNYA"],
        ];

        $this->db->insert_batch($this->table, $data);
    }
}