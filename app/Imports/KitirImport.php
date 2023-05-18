<?php
namespace App\Imports;


use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithConditionalSheets;

class KitirImport implements WithMultipleSheets 
{
    use WithConditionalSheets;

    public function conditionalSheets(): array
    {
        return [
            'REKAP POTONGAN' =>  new Sheet1(),
            // 'Worksheet 2' => ,
            // 'Worksheet 3' => ,
        ];
    }
}