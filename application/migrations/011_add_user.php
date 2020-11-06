<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_user extends CI_Migration {

  public function up()
  {
    $this->dbforge->add_field(array(
      'user_id' => [
        'type' => 'INT',
        'constraint' => 11,
        'unsigned' => TRUE,
        'auto_increment' => TRUE
      ],
      'user_nama' => [
        'type' => 'VARCHAR',
        'constraint' => '255',
      ],
      'user_nik' => [
        'type' => 'VARCHAR',
        'constraint' => '255',
        'unique'    => true
      ],
      'user_tempat_lahir' => [
        'type' => 'VARCHAR',
        'constraint' => '255',
      ],
      'user_tanggal_lahir' => [
        'type' => 'DATE'
      ],
      'user_tempat_lahir' => [
        'type' => 'VARCHAR',
        'constraint' => '255',
      ],
      'user_jk' => [
        'type' => 'VARCHAR',
        'constraint' => '255',
      ],
      'desa' => [
        'type' => 'VARCHAR',
        'constraint' => '255',
      ],
      'rt' => [
        'type' => 'VARCHAR',
        'constraint' => '255',
      ],
      'rw' => [
        'type' => 'VARCHAR',
        'constraint' => '255',
      ],
      'kecamatan' => [
        'type' => 'VARCHAR',
        'constraint' => '255',
      ],
      'kabupaten' => [
        'type' => 'VARCHAR',
        'constraint' => '255',
      ],
      'provinsi' => [
        'type' => 'VARCHAR',
        'constraint' => '255',
      ],
      'user_telepon' => [
        'type' => 'VARCHAR',
        'constraint' => '255',
      ],
      'last_login' => [
        'type' => 'DATETIME',
        'default' => date('Y-m-d H:i:s')
      ],
      'user_status' => [
        'type' => 'INT',
        'constraint' => 1,
        'default' => 0
      ],
      'user_password' => [
        'type' => 'VARCHAR',
        'constraint' => '255'
      ],
      'created_at' => [
        'type' => 'DATETIME',
        'default' => date('Y-m-d H:i:s')
      ],
      'updated_at' => [
        'type' => 'DATETIME',
        'default' => date('Y-m-d H:i:s')
      ],
    ));
    $this->dbforge->add_key('user_id', TRUE);
    $this->dbforge->create_table('user');
  }

  public function down()
  {
    $this->dbforge->drop_table('user');
  }
}