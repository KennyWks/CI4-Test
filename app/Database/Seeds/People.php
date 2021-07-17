<?php

namespace App\Database\Seeds;

use CodeIgniter\I18n\Time;

class People extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');

        for ($i = 0; $i < 50; $i++) {
            $data = [
                'nama' => $faker->name,
                'email'    => $faker->email,
                'alamat'    => $faker->address,
                'created_at' => Time::createFromTimestamp($faker->unixTime()),
                'updated_at' => Time::now()
            ];
            $this->db->table('tbl_people')->insert($data);
        }
        
        // $data = [
        //     'nama' => 'Ansel',
        //     'email'    => 'ansel@mail.com',
        //     'alamat'    => 'TDM',
        //     'created_at' => Time::now(),
        //     'updated_at' => Time::now()
        // ];

        // Using simple queries for one data
        // $this->db->query(
        //     "INSERT INTO tbl_people (nama, email, alamat, created_at, updated_at) VALUES(:nama:, :email:, :alamat:, :created_at: ,:updated_at:)",
        //     $data
        // );

        // Using Query Builder for one data
        // $this->db->table('tbl_people')->insert($data);

        // Using Query Builder for many data
        // $data = [
        //     [
        //         'nama' => 'Ansel',
        //         'email'    => 'ansel@mail.com',
        //         'alamat'    => 'TDM',
        //         'created_at' => Time::now(),
        //         'updated_at' => Time::now()
        //     ],
    
        //     [
        //         'nama' => 'Tino',
        //         'email'    => 'tino@mail.com',
        //         'alamat'    => 'Kayu Putih',
        //         'created_at' => Time::now(),
        //         'updated_at' => Time::now()
        //     ],
        // ];
        // $this->db->table('tbl_people')->insertBatch($data);
    }
}
