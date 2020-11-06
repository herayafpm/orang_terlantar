<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_agama extends CI_Migration {

  public function up()
  {
    $this->dbforge->add_field(array(
      'agama_id' => [
        'type' => 'INT',
        'constraint' => 11,
        'unsigned' => TRUE,
        'auto_increment' => TRUE
      ],
      'agama_nama' => [
        'type' => 'VARCHAR',
        'constraint' => '255',
      ],
    ));
    $this->dbforge->add_key('agama_id', TRUE);
    $this->dbforge->create_table('agama');
  }

  public function down()
  {
    $this->dbforge->drop_table('agama');
  }
}