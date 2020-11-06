<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_orang_terlantar extends CI_Migration {

  public function up()
  {
    $this->dbforge->add_field(array(
      'orang_terlantar_id' => [
        'type' => 'INT',
        'constraint' => 11,
        'unsigned' => TRUE,
        'auto_increment' => TRUE
      ],
      'orang_terlantar_nama' => [
        'type' => 'VARCHAR',
        'constraint' => '255',
      ],
    ));
    $this->dbforge->add_key('orang_terlantar_id', TRUE);
    $this->dbforge->create_table('orang_terlantar');
  }

  public function down()
  {
    $this->dbforge->drop_table('orang_terlantar');
  }
}