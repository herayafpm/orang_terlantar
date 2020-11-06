<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_kategori_ot extends CI_Migration {

  public function up()
  {
    $this->dbforge->add_field(array(
      'kategori_ot_id' => [
        'type' => 'INT',
        'constraint' => 11,
        'unsigned' => TRUE,
        'auto_increment' => TRUE
      ],
      'kategori_ot_nama' => [
        'type' => 'VARCHAR',
        'constraint' => '255',
      ],
    ));
    $this->dbforge->add_key('kategori_ot_id', TRUE);
    $this->dbforge->create_table('kategori_ot');
  }

  public function down()
  {
    $this->dbforge->drop_table('kategori_ot');
  }
}