<?php

namespace App\Exports;

use App\Models\mustahik;
use Maatwebsite\Excel\Concerns\FromCollection;

class mustahikExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return mustahik::all();
    }
}
