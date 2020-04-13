<?php

namespace App\Exports;

use App\Exports\Sheets\PendatangExport;
use App\Exports\Sheets\RombonganExport;
use App\Exports\Sheets\PengirimExport;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class DataExport implements WithMultipleSheets {
    use Exportable;

    public function sheets(): array {
        $sheets = [];
        $sheets[] = new PendatangExport();
        $sheets[] = new RombonganExport();
        $sheets[] = new PengirimExport();

        return $sheets;
    }
}