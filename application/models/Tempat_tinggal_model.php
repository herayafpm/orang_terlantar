<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Tempat_tinggal_model extends CI_Model
{
    protected $table = 'tempat_tinggal';
    protected $tempat_tinggal_nama = 'tempat_tinggal_nama';
    function __construct()
    {
        parent::__construct();
    }
    
    public function filter($search, $limit, $start, $order_field, $order_ascdesc){
        $this->db->like($this->tempat_tinggal_nama, $search); // Untuk menambahkan query where LIKE
        $this->db->order_by($order_field, $order_ascdesc); // Untuk menambahkan query ORDER BY
        $this->db->limit($limit, $start); // Untuk menambahkan query LIMIT
        return $this->db->get($this->table)->result_array(); // Eksekusi query sql sesuai kondisi diatas
    }
    public function count_all(){
        return $this->db->count_all($this->table); // Untuk menghitung semua data siswa
    }
    public function count_filter($search){
        $this->db->like($this->tempat_tinggal_nama, $search); // Untuk menambahkan query where OR LIKE
        return $this->db->get($this->table)->num_rows(); // Untuk menghitung jumlah data sesuai dengan filter pada textbox pencarian
    }
    
    /*
     * Get tempat_tinggal by tempat_tinggal_id
     */
    function get_tempat_tinggal($tempat_tinggal_id)
    {
        return $this->db->get_where($this->table,array('tempat_tinggal_id'=>$tempat_tinggal_id))->row_array();
    }
    
    /*
     * Get all tempat_tinggal count
     */
    function get_all_tempat_tinggal_count()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
        
    /*
     * Get all tempat_tinggal
     */
    function get_all_tempat_tinggal($params = [])
    {
        $this->db->order_by('tempat_tinggal_id', 'desc');
        if(isset($params) && !empty($params))
        {
          $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get($this->table)->result_array();
    }
        
    /*
     * function to add new tempat_tinggal
     */
    function add_tempat_tinggal($params)
    {
        $this->db->insert($this->table,$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update tempat_tinggal
     */
    function update_tempat_tinggal($tempat_tinggal_id,$params)
    {
        $this->db->where('tempat_tinggal_id',$tempat_tinggal_id);
        return $this->db->update($this->table,$params);
    }
    
    /*
     * function to delete tempat_tinggal
     */
    function delete_tempat_tinggal($tempat_tinggal_id)
    {
        return $this->db->delete($this->table,array('tempat_tinggal_id'=>$tempat_tinggal_id));
    }
    function seed()
    {
        $data = [
            ["tempat_tinggal_nama" => "RUMAH SENDIRI"],
            ["tempat_tinggal_nama" => "NUMPANG"],
            ["tempat_tinggal_nama" => "TIDAK PUNYA RUMAH"],
            ["tempat_tinggal_nama" => "BERPINDAH PINDAH"],
            ["tempat_tinggal_nama" => "IKUT ORANG LAIN"],
        ];

        $this->db->insert_batch($this->table, $data);
    }
}