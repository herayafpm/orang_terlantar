<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_bansos extends CI_Migration {

  public function up()
  {
    $this->dbforge->add_field(array(
      'bansos_id' => [
        'type' => 'INT',
        'constraint' => 11,
        'unsigned' => TRUE,
        'auto_increment' => TRUE
      ],
      'bansos_nama' => [
        'type' => 'VARCHAR',
        'constraint' => '255',
      ],
    ));
    $this->dbforge->add_key('bansos_id', TRUE);
    $this->dbforge->create_table('bansos');
  }

  public function down()
  {
    $this->dbforge->drop_table('bansos');
  }
}