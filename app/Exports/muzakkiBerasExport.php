<?php

namespace App\Exports;

use App\Models\muzakkiBeras;
use Maatwebsite\Excel\Concerns\FromCollection;

class muzakkiBerasExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return muzakkiBeras::all();
    }
}
