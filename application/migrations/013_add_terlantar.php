<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Add_terlantar extends CI_Migration
{

  public function up()
  {
    $this->dbforge->add_field(array(
      'terlantar_id' => [
        'type' => 'INT',
        'constraint' => 11,
        'unsigned' => TRUE,
        'auto_increment' => TRUE
      ],
      'no_urut' => [
        'type' => 'VARCHAR',
        'constraint' => '255',
      ],
      'orang_terlantar_id' => [
        'type'     => 'INT',
        'constraint' => 11,
        'unsigned' => TRUE,
        'null' => TRUE
      ],
      'identitas_kependudukan' => [
        'type' => 'INT',
        'constraint' => 1,
        'default' => 0
      ],
      'foto' => [
        'type' => 'VARCHAR',
        'constraint' => '255',
        'default' => 'kosong.png',
      ],
      'terlantar_nama' => [
        'type' => 'VARCHAR',
        'constraint' => '255',
      ],
      'terlantar_nik' => [
        'type' => 'VARCHAR',
        'constraint' => '255',
        'null' => true
      ],
      'terlantar_no_kk' => [
        'type' => 'VARCHAR',
        'constraint' => '255',
        'null' => true
      ],
      'terlantar_no_dtks' => [
        'type' => 'VARCHAR',
        'constraint' => '255',
        'null' => true
      ],
      'terlantar_tempat_lahir' => [
        'type' => 'VARCHAR',
        'constraint' => '255',
        'null' => true
      ],
      'terlantar_tanggal_lahir' => [
        'type' => 'VARCHAR',
        'constraint' => '255',
        'null' => true
      ],
      'terlantar_jenis_kelamin' => [
        'type' => 'VARCHAR',
        'constraint' => '255',
        'null' => true
      ],
      'agama_id' => [
        'type'     => 'INT',
        'constraint' => 11,
        'unsigned' => TRUE,
        'null' => TRUE
      ],
      'terlantar_alamat' => [
        'type' => 'VARCHAR',
        'constraint' => '255',
        'default' => ''
      ],
      'terlantar_rt' => [
        'type' => 'VARCHAR',
        'constraint' => '255',
        'default' => ''
      ],
      'terlantar_rw' => [
        'type' => 'VARCHAR',
        'constraint' => '255',
        'default' => ''
      ],
      'terlantar_desa' => [
        'type' => 'VARCHAR',
        'constraint' => '255',
        'default' => ''
      ],
      'terlantar_kecamatan' => [
        'type' => 'VARCHAR',
        'constraint' => '255',
        'default' => ''
      ],
      'terlantar_kabupaten' => [
        'type' => 'VARCHAR',
        'constraint' => '255',
        'default' => ''
      ],
      'terlantar_telp' => [
        'type' => 'VARCHAR',
        'constraint' => '255',
        'default' => ''
      ],

      'tempat_tinggal_id' => [
        'type'     => 'INT',
        'constraint' => 11,
        'unsigned' => TRUE,
        'null' => TRUE
      ],
      'kondisi_tempat_tinggal_id' => [
        'type'     => 'INT',
        'constraint' => 11,
        'unsigned' => TRUE,
        'null' => TRUE
      ],
      'kondisi_tempat_tinggal_id' => [
        'type'     => 'INT',
        'constraint' => 11,
        'unsigned' => TRUE,
        'null' => TRUE
      ],
      'kategori_ot_id' => [
        'type'     => 'INT',
        'constraint' => 11,
        'unsigned' => TRUE,
        'null' => TRUE
      ],
      'fasilitas_kesehatan_id' => [
        'type'     => 'INT',
        'constraint' => 11,
        'unsigned' => TRUE,
        'null' => TRUE
      ],
      'kondisi_ot_id' => [
        'type'     => 'INT',
        'constraint' => 11,
        'unsigned' => TRUE,
        'null' => TRUE
      ],
      'kebutuhan_diperlukan_id' => [
        'type'     => 'INT',
        'constraint' => 11,
        'unsigned' => TRUE,
        'null' => TRUE
      ],
      'kebutuhan_diperlukan_lainnya' => [
        'type'     => 'VARCHAR',
        'constraint' => '255',
        'null' => TRUE
      ],
      'alasan_terlantar' => [
        'type' => 'VARCHAR',
        'constraint' => '255',
        'default' => ''
      ],
      'tujuan_alamat' => [
        'type' => 'VARCHAR',
        'constraint' => '255',
        'default' => ''
      ],
      'tujuan_rt' => [
        'type' => 'VARCHAR',
        'constraint' => '255',
        'default' => ''
      ],
      'tujuan_rw' => [
        'type' => 'VARCHAR',
        'constraint' => '255',
        'default' => ''
      ],
      'tujuan_desa' => [
        'type' => 'VARCHAR',
        'constraint' => '255',
        'default' => ''
      ],
      'tujuan_kecamatan' => [
        'type' => 'VARCHAR',
        'constraint' => '255',
        'default' => ''
      ],
      'tujuan_kabupaten' => [
        'type' => 'VARCHAR',
        'constraint' => '255',
        'default' => ''
      ],
      'tujuan_provinsi' => [
        'type' => 'VARCHAR',
        'constraint' => '255',
        'default' => ''
      ],
      'sumber_dana_id' => [
        'type'     => 'INT',
        'constraint' => 11,
        'unsigned' => TRUE,
        'null' => TRUE
      ],
      'sumber_dana_lainnya' => [
        'type'     => 'VARCHAR',
        'constraint' => '255',
        'null' => TRUE
      ],
      'bansos_id' => [
        'type'     => 'INT',
        'constraint' => 11,
        'unsigned' => TRUE,
        'null' => TRUE
      ],
      'bansos_lainnya' => [
        'type'     => 'VARCHAR',
        'constraint' => '255',
        'null' => TRUE
      ],
      'user_daftar' => [
        'type'     => 'INT',
        'constraint' => 11,
        'unsigned' => TRUE,
        'null' => TRUE
      ],
      'proses_id' => [
        'type'     => 'INT',
        'constraint' => 11,
        'unsigned' => TRUE,
        'null' => TRUE
      ],
      'verif_id' => [
        'type'     => 'INT',
        'constraint' => 11,
        'unsigned' => TRUE,
        'null' => TRUE
      ],
      'tolak_id' => [
        'type'     => 'INT',
        'constraint' => 11,
        'unsigned' => TRUE,
        'null' => TRUE
      ],
      'keterangan' => [
        'type' => 'VARCHAR',
        'constraint' => 255,
        'default' => ''
      ],
      'created_at' => [
        'type' => 'TIMESTAMP',
        'default' => date('Y-m-d H:i:s')
      ],
      'updated_at' => [
        'type' => 'TIMESTAMP',
        'default' => date('Y-m-d H:i:s')
      ],
    ));
    $this->dbforge->add_key('terlantar_id', TRUE);
    $this->dbforge->create_table('terlantar');
    // $this->db->query(add_foreign_key('terlantar', 'orang_terlantar_id', 'orang_terlantar(orang_terlantar_id)'));
    // $this->db->query(add_foreign_key('terlantar', 'agama_id', 'agama(agama_id)'));
    // $this->db->query(add_foreign_key('terlantar', 'tempat_tinggal_id', 'tempat_tinggal(tempat_tinggal_id)'));
    // $this->db->query(add_foreign_key('terlantar', 'kondisi_tempat_tinggal_id', 'kondisi_tempat_tinggal(kondisi_tempat_tinggal_id)'));
    // $this->db->query(add_foreign_key('terlantar', 'kategori_ot_id', 'kategori_ot(kategori_ot_id)'));
    // $this->db->query(add_foreign_key('terlantar', 'fasilitas_kesehatan_id', 'fasilitas_kesehatan(fasilitas_kesehatan_id)'));
    // $this->db->query(add_foreign_key('terlantar', 'kondisi_ot_id', 'kondisi_ot(kondisi_ot_id)'));
    // $this->db->query(add_foreign_key('terlantar', 'kebutuhan_diperlukan_id', 'kebutuhan_diperlukan(kebutuhan_diperlukan_id)'));
    // $this->db->query(add_foreign_key('terlantar', 'sumber_dana_id', 'sumber_dana(sumber_dana_id)'));
    // $this->db->query(add_foreign_key('terlantar', 'bansos_id', 'bansos(bansos_id)'));
    // $this->db->query(add_foreign_key('terlantar', 'user_daftar', 'user(user_id)'));
    // $this->db->query(add_foreign_key('terlantar', 'verif_by', 'admin(admin_id)'));
    // $this->db->query(add_foreign_key('terlantar', 'terima_by', 'admin(admin_id)'));
    // $this->db->query(add_foreign_key('terlantar', 'tolak_by', 'admin(admin_id)'));
  }

  public function down()
  {
    // $this->db->query(drop_foreign_key('terlantar', 'orang_terlantar_id'));
    // $this->db->query(drop_foreign_key('terlantar', 'agama_id'));
    // $this->db->query(drop_foreign_key('terlantar', 'tempat_tinggal_id'));
    // $this->db->query(drop_foreign_key('terlantar', 'kondisi_tempat_tinggal_id'));
    // $this->db->query(drop_foreign_key('terlantar', 'kategori_ot_id'));
    // $this->db->query(drop_foreign_key('terlantar', 'fasilitas_kesehatan_id'));
    // $this->db->query(drop_foreign_key('terlantar', 'kondisi_ot_id'));
    // $this->db->query(drop_foreign_key('terlantar', 'kebutuhan_diperlukan_id'));
    // $this->db->query(drop_foreign_key('terlantar', 'bansos_id'));
    // $this->db->query(drop_foreign_key('terlantar', 'user_daftar'));
    // $this->db->query(drop_foreign_key('terlantar', 'verif_by'));
    // $this->db->query(drop_foreign_key('terlantar', 'terima_by'));
    // $this->db->query(drop_foreign_key('terlantar', 'tolak_by'));
    $this->dbforge->drop_table('terlantar');
  }
}
