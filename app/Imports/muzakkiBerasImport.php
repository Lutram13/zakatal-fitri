<?php

namespace App\Imports;

use App\Models\muzakkiBeras;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class muzakkiBerasImport implements ToModel, WithHeadingRow 
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new muzakkiBeras([            
            'nama'     => $row['nama'],
            'alamat'    => $row['alamat'], 
            'rt'    => $row['rt'], 
            'jumlahBeras'    => $row['jumlahberas'], 
            'keterangan'    => $row['keterangan'], 

                
            // 'nama'     => $row[0],
            // 'alamat'    => $row[1], 
            // 'rt'    => $row[2], 
            // 'jumlahBeras'    => $row[3], 
            // 'keterangan'    => $row[4], 
        ]);
    }
}
