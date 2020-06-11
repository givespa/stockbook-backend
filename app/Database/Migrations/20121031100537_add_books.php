<?php namespace App\Database\Migrations;

class AddBooks extends \CodeIgniter\Database\Migration {

        public function up()
        {
                $this->forge->addField([
                        'id'          => [
                                'type'           => 'INT',
                                'constraint'     => 5,
                                'unsigned'       => TRUE,
                                'auto_increment' => TRUE,
                                'null'           => FALSE,
                        ],
                        'name'       => [
                                'type'           => 'TEXT',
                                'null'           => FALSE,
                        ],
                        'author' => [
                                'type'           => 'TEXT',
                                'null'           => FALSE,
                        ],
                        'editorial' => [
                                'type'           => 'TEXT',
                                'null'           => FALSE,
                        ],
                        'year'          => [
                            'type'           => 'DATE',
                            'null'           => FALSE,
                        ],
                        'synopsis' => [
                            'type'           => 'TEXT',
                            'null'           => FALSE,
                        ],
                        'created_at' => [
                                'type'           => 'DATETIME',
                                'null'           => FALSE,
                        ],
                        'updated_at' => [
                                'type'           => 'DATETIME',
                                'null'           => FALSE,
                        ],
                ]);
                $this->forge->addKey('id', TRUE);
                $this->forge->createTable('books');
        }

        public function down()
        {
                $this->forge->dropTable('books');
        }
}