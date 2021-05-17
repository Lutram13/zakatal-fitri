<?php

namespace App\Imports;

use App\Models\muzakkiUang;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class muzakkiUangImport implements ToModel, WithHeadingRow 
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new muzakkiUang([
            
            'nama'     => $row['nama'],
            'alamat'    => $row['alamat'], 
            'rt'    => $row['rt'], 
            'jumlahUang'    => $row['jumlahuang'], 
            'keterangan'    => $row['keterangan'], 
        ]);
    }
}
