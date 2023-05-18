<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithMappedCells;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithGroupedHeadingRow;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;

class Sheet3 implements WithHeadingRow, ToModel, SkipsEmptyRows, WithGroupedHeadingRow
{
    
    use Importable;

    private $rows = 0;

    public $start = 7;
    public $data = [];

    public function model(array $row)
    {
        return $row;
    }

    public function headingRow(): int
    {
        return $this->start;
    }
}
