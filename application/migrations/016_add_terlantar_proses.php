<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Add_terlantar_proses extends CI_Migration
{

  public function up()
  {
    $this->dbforge->add_field(array(
      'proses_id' => [
        'type' => 'INT',
        'constraint' => 11,
        'unsigned' => TRUE,
        'auto_increment' => TRUE
      ],
      'terlantar_id' => [
        'type'     => 'INT',
        'constraint' => 11,
        'unsigned' => TRUE,
        'null' => TRUE
      ],
      'proses_by' => [
        'type'     => 'INT',
        'constraint' => 11,
        'unsigned' => TRUE,
        'null' => TRUE
      ],
      'proses_at' => [
        'type' => 'TIMESTAMP',
        'null' => TRUE
      ],
    ));
    $this->dbforge->add_key('proses_id', TRUE);
    $this->dbforge->create_table('terlantar_proses');
    // $this->db->query(add_foreign_key('terlantar_proses', 'sumber_dana_id', 'sumber_dana(sumber_dana_id)'));
  }

  public function down()
  {
    $this->dbforge->drop_table('terlantar_proses');
  }
}
