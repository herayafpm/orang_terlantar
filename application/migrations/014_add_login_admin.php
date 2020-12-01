<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Add_login_admin extends CI_Migration
{

  public function up()
  {
    $this->dbforge->add_field(array(
      'admin_id' => [
        'type' => 'INT',
        'constraint' => 11,
        'unsigned' => TRUE,
      ],
      'created_at' => [
        'type' => 'TIMESTAMP',
        'null' => TRUE
      ],
    ));
    $this->dbforge->create_table('login_admin');
  }

  public function down()
  {
    $this->dbforge->drop_table('login_admin');
  }
}
