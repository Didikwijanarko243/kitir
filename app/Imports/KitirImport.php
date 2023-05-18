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
            'Simp. Wajib' => new Sheet2(),
            'Reguler' => new Sheet3(),
            'BJS' => new Sheet4()
        ];
    }
}