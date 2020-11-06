<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_fasilitas_kesehatan extends CI_Migration {

  public function up()
  {
    $this->dbforge->add_field(array(
      'fasilitas_kesehatan_id' => [
        'type' => 'INT',
        'constraint' => 11,
        'unsigned' => TRUE,
        'auto_increment' => TRUE
      ],
      'fasilitas_kesehatan_nama' => [
        'type' => 'VARCHAR',
        'constraint' => '255',
      ],
    ));
    $this->dbforge->add_key('fasilitas_kesehatan_id', TRUE);
    $this->dbforge->create_table('fasilitas_kesehatan');
  }

  public function down()
  {
    $this->dbforge->drop_table('fasilitas_kesehatan');
  }
}