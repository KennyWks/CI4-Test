<?php

namespace App\Database\Seeds;

use CodeIgniter\I18n\Time;

class orangSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        // $data = [
        // [
        //     'nama' => 'Ansel',
        //     'alamat'    => 'Kupang',
        //     'created_at' => Time::now(),
        //     'updated_at' => Time::now()
        // ],

        // [
        //     'nama' => 'Tino',
        //     'alamat'    => 'Kupang',
        //     'created_at' => Time::now(),
        //     'updated_at' => Time::now()
        // ],
        // ];

        $faker = \Faker\Factory::create('id_ID');

        for ($i = 0; $i < 50; $i++) {
            $data = [
                'nama' => $faker->name,
                'email'    => $faker->email,
                'alamat'    => $faker->address,
                'created_at' => Time::createFromTimestamp($faker->unixTime()),
                'updated_at' => Time::now()
            ];
            $this->db->table('tbl_orang')->insert($data);
        }

        // Simple Queries
        // $this->db->query(
        //     "INSERT INTO tbl_orang (nama, email, alamat, created_at, updated_at) VALUES(:nama:, :alamat:, :created_at: ,:updated_at:)",
        //     $data
        // );

        // Using Query Builder
        // $this->db->table('tbl_orang')->insert($data);
        // $this->db->table('tbl_orang')->insertBatch($data);
    }
}
