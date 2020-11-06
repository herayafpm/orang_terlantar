<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_tempat_tinggal extends CI_Migration {

  public function up()
  {
    $this->dbforge->add_field(array(
      'tempat_tinggal_id' => [
        'type' => 'INT',
        'constraint' => 11,
        'unsigned' => TRUE,
        'auto_increment' => TRUE
      ],
      'tempat_tinggal_nama' => [
        'type' => 'VARCHAR',
        'constraint' => '255',
      ],
    ));
    $this->dbforge->add_key('tempat_tinggal_id', TRUE);
    $this->dbforge->create_table('tempat_tinggal');
  }

  public function down()
  {
    $this->dbforge->drop_table('tempat_tinggal');
  }
}