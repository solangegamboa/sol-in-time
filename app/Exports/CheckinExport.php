<?php

namespace App\Exports;

use App\Models\Checkin;
use Maatwebsite\Excel\Concerns\FromCollection;

class CheckinExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Checkin::all();
    }
}
