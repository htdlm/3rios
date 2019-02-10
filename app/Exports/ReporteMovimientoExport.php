<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class ReporteMovimientoExport implements WithMultipleSheets
{

  use Exportable;
  protected $MovId;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct(int $MovId)
    {
        $this->MovId=$MovId;
    }

    public function sheets():array
    {
      $sheets=[];
      $sheets[]=new MovimientoExport($this->MovId);
      $sheets[]=new EventoExport($this->MovId);
      return $sheets;
    }
}
