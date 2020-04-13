<?php

namespace App\Exports\Sheets;

use App\Pendatang;
use App\Rombongan;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use PhpOffice\PhpSpreadsheet\Cell\DataType;

class RombonganExport implements FromArray, WithHeadings, WithTitle, WithColumnFormatting {
    public function array(): array {
        $datas = Pendatang::get();
        $results = [];
        if ( count($datas) ) {
            foreach( $datas as $idx_kk=>$data_kk ) {
                $data_anggs = Rombongan::where('id_pendatang', $data_kk->id)->get();
                if ( count($data_anggs) ) {
                    foreach( $data_anggs as $idx_angg=>$data_angg ) {
                        $anggota = [
                            $idx_angg+1,
                            strtoupper($data_angg->nama),
                            $data_angg->umur,
                            $data_angg->status,
                            $data_angg->kes1 ? 'Y' : 'T',
                            $data_angg->kes2 ? 'Y' : 'T',
                            $data_angg->kes3 ? 'Y' : 'T',
                            $data_angg->kes4 ? 'Y' : 'T',
                            $data_angg->kes5 ? 'Y' : 'T',
                            $data_angg->kes6 ? 'Y' : 'T',
                            $data_angg->kes7 ? 'Y' : 'T',
                            $data_angg->kes8 ? 'Y' : 'T',
                            $data_angg->kes9 ? 'Y' : 'T',
                            strtoupper($data_angg->sakit),
                        ];
                        $kepala = ['', '', ''];
                        if ( !$idx_angg ) {
                            $kepala = [
                                $idx_kk+1,
                                strtoupper($data_kk->object_fname),
                                $data_kk->object_nik
                            ];
                        }
                        $results[] = array_merge($kepala, $anggota);
                    }
                } else {
                    $results[] = [
                        $idx_kk+1,
                        strtoupper($data_kk->object_fname),
                        strtoupper($data_kk->object_nik),
                    ];
                }
            }
        }
        return $results;
    }

    public function headings(): array {
        return [
            '#',
            'KEP. KELUARGA',
            'NIK',
            '#',
            'NAMA',
            'UMUR',
            'STATUS',
            'DEMAM',
            'BATUK',
            'SESAK NAPAS',
            'SAKIT TENGGOROKAN',
            'ANOSMIA',
            'AGEUSIA',
            'GUNAKAN MASKER',
            'GUNAKAN HAND SANITIZER',
            'CUCI TANGAN DG SABUN',
            'RIWAYAT PENYAKIT',
        ];
    }

    public function title(): string {
        return 'ANGGOTA KEL.';
    }
    
    public function columnFormats(): array{
        return [
            // 'C' => DataType::TYPE_STRING,
        ];
    }
}