<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Mahasiswa extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'          => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => TRUE,
				'auto_increment' => TRUE
			],
			'nama'       => [
				'type'           => 'TEXT',
				'null'     => FALSE,
			],
			'nim' => [
				'type'           => 'VARCHAR',
				'constraint'     => '12',
			],
			'email'       => [
				'type'           => 'TEXT',
				'null'     => FALSE,
			],
			'prodi'       => [
				'type'           => 'TEXT',
				'null'     => FALSE,
			],
			'foto' => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
			],
			'created_at' => [
				'type'           => 'DATETIME',
				'null'     => TRUE,
			],
			'updated_at' => [
				'type'           => 'DATETIME',
				'null'     => TRUE,
			],
		]);
		$this->forge->addKey('id', TRUE);
		$this->forge->createTable('tbl_mhs');
	}

	public function down()
	{
		$this->forge->dropTable('tbl_mhs');
	}
}
