<?php

namespace App\Exports;

use App\Models\muzakkiUang;
use Maatwebsite\Excel\Concerns\FromCollection;

class muzakkiUangExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return muzakkiUang::all();
    }
}
