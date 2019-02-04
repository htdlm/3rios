<?php

namespace App\Exports;

use App\Movimiento;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithTitle;

class MovimientoExport implements FromQuery,WithMapping,WithHeadings,
ShouldAutoSize,WithEvents,WithTitle
{
  private $MovId;

    public function __construct(int $MovId)
    {
        $this->MovId=$MovId;
    }


    /**
    * @return \Illuminate\Support\Query
    */
    public function query()
    {
        return Movimiento::query()->where('MovId',$this->MovId);
    }

    public function map($movimiento): array
    {
      $adi1='';
      $adi2='';
      $adi3='';
      if($movimiento->AdiId1!=null){
          $adi1=$movimiento->AdiValId1." ".$movimiento->adicional1->DesAdi;
      }

      if($movimiento->AdiId2!=null){
          $adi2=$movimiento->AdiValId2." ".$movimiento->adicional2->DesAdi;
      }

      if($movimiento->AdiId3!=null){
          $adi3=$movimiento->AdiValId3." ".$movimiento->adicional3->DesAdi;
      }

       return [
           $movimiento->MovId,
           $movimiento->FecCre,
           $movimiento->FecAct,
           $movimiento->FecSer,
           $movimiento->FecSol,
           $movimiento->FecRea,
           $movimiento->fase_movimiento->FasMov,
           $movimiento->cliente_localidad->NomLoc,
           $movimiento->RefCli,
           $movimiento->ObsMov,
           $movimiento->NumTar,
           $movimiento->KilBru,
           $movimiento->KilNet,
           $movimiento->unidad->DesUni,
           $adi1,
           $adi2,
           $adi3,
           $movimiento->user->name,
           $movimiento->SemSol,
           $movimiento->SemSer,
           $movimiento->SemRea,
           $movimiento->FacTar,
           $movimiento->FacTarTot,
       ];
   }

   public function headings():array
   {
     return [
       'Id del Servicio',
       'Fecha de Creacion',
       'Fecha de Actualizacion',
       'Fecha de Servicio',
       'Fecha de Solucion',
       'Fecha Real',
       'Fase del Servicio',
       'Destino/Localidad',
       'Cod. Minigrip',
       'Observaciones',
       'No. Tarimas',
       'Kilos Brutos',
       'Kilos Netos',
       'Unidad',
       'Eventualidad 1',
       'Eventualidad 2',
       'Eventualidad 3',
       'Usuario capturador',
       'Semana de solucion',
       'Semana de Servicio',
       'Semana Real',
       'Factor de la tarifa',
       'Factor total de la tarifa',
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
                  $event->sheet->getStyle('A1:W1')->applyFromArray($styleArray);
              },
          ];
  }

  public function title():String
  {
    return 'Servicio';
  }
}
