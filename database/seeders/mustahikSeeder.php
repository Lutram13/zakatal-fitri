<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class mustahikSeeder extends Seeder
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
                'golongan_id' => '1',
                'nama' => 'CONTOH : HARUS DIHAPUS',
                'alamat' => 'CONTOH : HARUS DIHAPUS',
                'keterangan' => 'CONTOH : HARUS DIHAPUS',
            ],         
        ];

        DB::table('mustahiks')->insert($post);
    }
}
