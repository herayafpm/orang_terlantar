<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Add_admin extends CI_Migration
{

  public function up()
  {
    $this->dbforge->add_field(array(
      'admin_id' => [
        'type' => 'INT',
        'constraint' => 11,
        'unsigned' => TRUE,
        'auto_increment' => TRUE
      ],
      'admin_nama' => [
        'type' => 'VARCHAR',
        'constraint' => '255',
      ],
      'admin_username' => [
        'type' => 'VARCHAR',
        'constraint' => '255',
        'unique'    => true
      ],
      'role_id' => [
        'type' => 'INT',
        'constraint' => 1,
        'default'    => 1
      ],
      'admin_password' => [
        'type' => 'VARCHAR',
        'constraint' => '255'
      ],
      'created_at' => [
        'type' => 'TIMESTAMP',
        'default' => date('Y-m-d H:i:s')
      ],
      'updated_at' => [
        'type' => 'TIMESTAMP',
        'default' => date('Y-m-d H:i:s')
      ],
    ));
    $this->dbforge->add_key('admin_id', TRUE);
    $this->dbforge->create_table('admin');
  }

  public function down()
  {
    $this->dbforge->drop_table('admin');
  }
}
