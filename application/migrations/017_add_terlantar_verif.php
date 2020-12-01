<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Add_terlantar_verif extends CI_Migration
{

  public function up()
  {
    $this->dbforge->add_field(array(
      'verif_id' => [
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
      'verif_by' => [
        'type'     => 'INT',
        'constraint' => 11,
        'unsigned' => TRUE,
        'null' => TRUE
      ],
      'verif_at' => [
        'type' => 'TIMESTAMP',
        'null' => TRUE
      ],
    ));
    $this->dbforge->add_key('verif_id', TRUE);
    $this->dbforge->create_table('terlantar_verif');
    // $this->db->query(add_foreign_key('terlantar_verif', 'sumber_dana_id', 'sumber_dana(sumber_dana_id)'));
  }

  public function down()
  {
    $this->dbforge->drop_table('terlantar_verif');
  }
}
