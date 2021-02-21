<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Add_kebutuhan_diperlukan extends CI_Migration
{

  public function up()
  {
    $this->dbforge->add_field(array(
      'kebutuhan_diperlukan_id' => [
        'type' => 'INT',
        'constraint' => 11,
        'unsigned' => TRUE,
        'auto_increment' => TRUE
      ],
      'kebutuhan_diperlukan_nama' => [
        'type' => 'VARCHAR',
        'constraint' => '255',
      ],
    ));
    $this->dbforge->add_key('kebutuhan_diperlukan_id', TRUE);
    $this->dbforge->create_table('kebutuhan_diperlukan');
  }

  public function down()
  {
    $this->dbforge->drop_table('kebutuhan_diperlukan');
  }
}
