<?php

namespace App\Exports\Sheets;

use App\Pendatang;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
// use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use PhpOffice\PhpSpreadsheet\Cell\DataType;

class PendatangExport implements FromArray, WithHeadings, WithTitle, WithColumnFormatting {
    public function array(): array {
        $datas = Pendatang::get();
        $results = [];
        if ( count($datas) ) {
            foreach( $datas as $idx=>$data ) {
                $results[] = [
                    $idx+1,
                    strtoupper($data->sender_nname),
                    $data->created_at,
                    strtoupper($data->object_fname),
                    strtoupper($data->object_nname),
                    strtoupper($data->object_nik),
                    $data->object_umur,
                    strtoupper($data->object_alasal),
                    strtoupper($data->object_kerja),
                    strtoupper($data->object_alkerja),
                    $data->object_nope,
                    $data->object_jumlah,
                    strtoupper($data->note_asal),
                    strtoupper($data->note_branglok),
                    $data->note_brangwak,
                    strtoupper($data->note_singgah),
                    $data->note_tiba,
                    strtoupper($data->note_moda),
                    strtoupper($data->note_tinggal),
                    strtoupper($data->note_tempat)
                ];
            }
        }
        return $results;
    }

    public function headings(): array {
        return [
            '#',
            'PENGINPUT',
            'WAKTU INPUT',
            'NAMA LENGKAP',
            'NAMA PANGGILAN',
            'NIK',
            'UMUR',
            'ALAMAT ASAL',
            'PEKERJAAN',
            'ALAMAT KERJA',
            'NO HP',
            'JMLH ANG. KEL.',
            'DARI KOTA',
            'LOKASI BERANGKAT',
            'WAKTU BERANGKAT',
            'TEMPAT DISINGGAHI',
            'WAKTU TIBA',
            'TRANSPORTASI',
            'ALAMAT DI LOKASI',
            'STATUS TEMPAT',
        ];
    }

    public function title(): string {
        return 'KEPALA KEL.';
    }
    
    public function columnFormats(): array{
        return [
            // 'F' => DataType::TYPE_STRING,
        ];
    }
}