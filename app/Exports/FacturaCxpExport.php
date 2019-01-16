<?php

namespace App\Exports;
use App\FacturaCxp;

use Maatwebsite\Excel\Concerns\FromCollection;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;

class FacturaCxpExport implements FromCollection, WithHeadings, WithMapping,ShouldAutoSize,WithColumnFormatting,WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return FacturaCxp::all();
    }

    public function map($factura): array
    {
       return [
           $factura->FacCxpNum,
           $factura->movimiento->RefCli,
           $factura->ConFac,
           $factura->FecCreFac,
           $factura->FecFac,
           $factura->FecPre,
           $factura->ImpFac,
           $factura->IvaFac,
           $factura->SubFac,
           $factura->RetFac,
           $factura->TotFac,
           $factura->SalFac,
       ];
   }

    public function headings():array
    {
      return [
        'Numero de factura',
        'Movimiento',
        'Persona de Contacto',
        'Fecha de creacion de factura',
        'Fecha de factura',
        'Fecha de presentacion',
        'Importe',
        'IVA',
        'Subtotal',
        'Retencion',
        'Total',
        'Saldo pendiente'
      ];
    }

    /**
  * @return array
  */
 public function columnFormats(): array
 {
     return [
         'D' => NumberFormat::FORMAT_DATE_DDMMYYYY,
         'E' => NumberFormat::FORMAT_DATE_DDMMYYYY,
         'F' => NumberFormat::FORMAT_DATE_DDMMYYYY,
     ];
 }

 public function registerEvents(): array
    {

      $styleArray=[
          'font' => [
            'bold' => true,
          ]
      ];
        return [
            // Handle by a closure.
            AfterSheet::class => function(AfterSheet $event) use ($styleArray) {
                $event->sheet->getStyle('A1:L1')->applyFromArray($styleArray);
            },
        ];
    }
}
