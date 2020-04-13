<?php

return [
    'title' => ucwords(strtolower( env('APP_NAME', '') .' Desa '. env('DESA_NAMA', '') )),
    'name' => ucwords(strtolower( 'Desa '. env('DESA_NAMA', '') )),
    'fullname' => ucwords(strtolower( 'Desa '. env('DESA_NAMA', '') .' Kecamatan '. env('DESA_KEC', '') .' Kabupaten '. env('DESA_KAB', '') )),
    'foot' => ucwords(strtolower( 'Pemerintah Desa '. env('DESA_NAMA', '') .' | '. env('DESA_KEC', '') .' - ' . env('DESA_KAB', '') )),
];

