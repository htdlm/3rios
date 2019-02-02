<?php

namespace App\Exports;

use App\Movimiento;
use Maatwebsite\Excel\Concerns\FromCollection;

class MovimientoExport implements FromCollection
{
      public function __construct()
      {
      }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Movimiento::find(1)->first();
    }
}
