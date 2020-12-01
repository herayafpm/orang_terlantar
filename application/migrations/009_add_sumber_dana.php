<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_sumber_dana extends CI_Migration {

  public function up()
  {
    $this->dbforge->add_field(array(
      'sumber_dana_id' => [
        'type' => 'INT',
        'constraint' => 11,
        'unsigned' => TRUE,
        'auto_increment' => TRUE
      ],
      'sumber_dana_nama' => [
        'type' => 'VARCHAR',
        'constraint' => '255',
      ],
    ));
    $this->dbforge->add_key('sumber_dana_id', TRUE);
    $this->dbforge->create_table('sumber_dana');
  }

  public function down()
  {
    $this->dbforge->drop_table('sumber_dana');
  }
}