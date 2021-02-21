<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Add_bansos extends CI_Migration
{

  public function up()
  {
    $this->dbforge->add_field(array(
      'bansos_id' => [
        'type' => 'INT',
        'constraint' => 11,
        'unsigned' => TRUE,
        'auto_increment' => TRUE
      ],
      'sumber_dana_id' => [
        'type' => 'INT',
        'constraint' => 11,
        'unsigned' => TRUE,
      ],
      'bansos_nama' => [
        'type' => 'VARCHAR',
        'constraint' => '255',
      ],
      'bansos_total' => [
        'type' => 'INT',
        'constraint' => 25,
      ],
    ));
    $this->dbforge->add_key('bansos_id', TRUE);
    $this->dbforge->create_table('bansos');
    // $this->db->query(add_foreign_key('bansos', 'sumber_dana_id', 'sumber_dana(sumber_dana_id)'));
  }

  public function down()
  {
    $this->dbforge->drop_table('bansos');
  }
}
