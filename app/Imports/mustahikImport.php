<?php

namespace App\Imports;

use App\Models\mustahik;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class mustahikImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new mustahik([
            'nama'     => $row['nama'],
            'alamat'    => $row['alamat'], 
            'keterangan'    => $row['keterangan'], 
            'golongan_id'    => $row['golongan_id'], 
            
        ]);
    }
}
