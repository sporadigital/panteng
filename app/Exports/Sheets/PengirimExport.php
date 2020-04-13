<?php

namespace App\Exports\Sheets;

use App\Pendatang;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use PhpOffice\PhpSpreadsheet\Cell\DataType;

class PengirimExport implements FromArray, WithHeadings, WithTitle, WithColumnFormatting {
    public function array(): array {
        $datas = Pendatang::get();
        $results = [];
        if ( count($datas) ) {
            foreach( $datas as $idx=>$data ) {
                $results[] = [
                    $idx+1,
                    strtoupper($data->sender_fname),
                    strtoupper($data->sender_nname),
                    strtoupper($data->sender_nik),
                    strtoupper($data->sender_address),
                    strtoupper($data->sender_phone),
                    strtoupper($data->object_fname),
                    strtoupper($data->object_nik),
                ];
            }
        }
        return $results;
    }

    public function headings(): array {
        return [
            '#',
            'NAMA LENGKAP',
            'NAMA PANGGILAN',
            'NIK',
            'ALAMAT',
            'NO HP',
            'KEPALA KEL.',
            'NIK KEPALA KEL.',
        ];
    }

    public function title(): string {
        return 'PENGINPUT';
    }
    
    public function columnFormats(): array{
        return [
            // 'D' => DataType::TYPE_STRING,
            // 'H' => DataType::TYPE_STRING,
        ];
    }
}