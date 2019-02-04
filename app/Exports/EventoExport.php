<?php

namespace App\Exports;

use App\Evento;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithTitle;

class EventoExport implements FromQuery,WithMapping,WithHeadings,
ShouldAutoSize,WithEvents,WithTitle
{
    private $MovId;

    public function __construct(int $MovId)
    {
      $this->MovId=$MovId;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {
        return Evento::where('MovId',$this->MovId);
    }

    public function map($evento): array
    {
      $adi='';

      if($evento->AdiId!=null){
          $adi1=$evento->adicional->DesAdi;
      }

       return [
           $evento->EveId,
           $evento->RefCli,
           $evento->FecAct,
           $evento->FecSol,
           $evento->FecRea,
           $evento->fase_movimiento->FasMov,
           $evento->ObsEve,
           $adi,
           $evento->SemAct,
           $evento->SemSol,
           $evento->SemRea,
           $evento->created_at,
           $evento->user->name,
       ];
   }

   public function headings():array
   {
     return [
       'Id del Evento',
       'Cod. Minigrip',
       'Fecha de Actualizacion',
       'Fecha de Solucion',
       'Fecha Real',
       'Fase del Servicio',
       'Observaciones',
       'Eventualidad',
       'Semana Actual',
       'Semana de Solucion',
       'Semana Real',
       'Fecha de Creacion',
       'Usuario capturador'
     ];
   }

   public function registerEvents(): array
  {
        $styleArray=[
            'font' => [
              'bold' => true,
              'size' => 16,
            ]
        ];

          return [
              // Handle by a closure.
              AfterSheet::class => function(AfterSheet $event) use ($styleArray) {
                  $event->sheet->getStyle('A1:P1')->applyFromArray($styleArray);
              },
          ];
  }

    public function title():String
    {
      return 'Eventos';
    }
}
