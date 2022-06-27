<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class OsingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = [
            [
                'indo' => "Apalagi",
                'osing' => 'Paran',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'indo' => "Apalagi kamu",
                'osing' => 'Nyalingo hiro',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'indo' => "Acap kali",
                'osing' => 'Paceke,angger',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'indo' => "Alasan",
                'osing' => 'Anggul-anggul',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'indo' => "Ada",
                'osing' => 'Ono, onok',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'indo' => "Adu",
                'osing' => 'Bombong',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'indo' => "Agar supaya",
                'osing' => 'myakne, myane',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'indo' => "Apalagi kamu",
                'osing' => 'Nyalingo hiro',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            // [
            //     'indo' => "Apalagi kamu",
            //     'osing' => 'Nyalingo hiro',
            //     'created_at' => new \DateTime,
            //     'updated_at' => null,
            // ],

        ];

        \DB::table('osings')->insert($posts);
    }
}
