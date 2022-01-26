<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class golonganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $post= [
            [
                'nama' => 'Fakir',
                'jumlahBeras' => 0,
                'jumlahUang' => 0.0,
            ],
            [
                'nama' => 'Miskin',
                'jumlahBeras' => 0,
                'jumlahUang' => 0.0,
            ],
            [
                'nama' => 'Gharim',
                'jumlahBeras' => 0,
                'jumlahUang' => 0.0,
            ],
            [
                'nama' => 'Riqab',
                'jumlahBeras' => 0,
                'jumlahUang' => 0.0,
            ],
            [
                'nama' => 'Fisabilillah',
                'jumlahBeras' => 0,
                'jumlahUang' => 0.0,
            ],
            [
                'nama' => 'Mualaf',
                'jumlahBeras' => 0,
                'jumlahUang' => 0.0,
            ],
            [
                'nama' => 'Ibnu Sabil',
                'jumlahBeras' => 0,
                'jumlahUang' => 0.0,
            ],
            [
                'nama' => 'Amil_Zakat',
                'jumlahBeras' => 0,
                'jumlahUang' => 0.0,
            ],            
        ];

        DB::table('golongans')->insert($post);
    }
}
