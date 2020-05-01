<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pendatang;
use App\Rombongan;
use File;

class PublicController extends Controller {
    public function __construct() {
    }
    
    public function form() {
        return view('form');
    }
    
    public function form_send(Request $request) {
        //dd( $request->ip() );
        $data = Pendatang::create([
            'sender_fname' => strtoupper($request->sender_fname),
            'sender_nname' => strtoupper($request->sender_nname),
            'sender_nik' => $request->sender_nik,
            'sender_address' => strtoupper($request->sender_address),
            'sender_phone' => $request->sender_phone,
            'object_fname' => strtoupper($request->object_fname),
            'object_nname' => strtoupper($request->object_nname),
            'object_nik' => $request->object_nik,
            'object_umur' => $request->object_umur,
            'object_alasal' => strtoupper($request->object_alasal),
            'object_kerja' => strtoupper($request->object_kerja),
            'object_alkerja' => strtoupper($request->object_alkerja),
            'object_nope' => $request->object_nope,
            'object_jumlah' => $request->object_jumlah,
            'note_asal' => strtoupper($request->note_asal),
            'note_branglok' => strtoupper($request->note_branglok),
            'note_brangwak' => $request->note_brangwak,
            'note_singgah' => strtoupper($request->note_singgah),
            'note_tiba' => $request->note_tiba,
            'note_moda' => strtoupper($request->note_moda),
            'note_tinggal' => strtoupper($request->note_tinggal),
            'note_tempat' => ( $request->note_tempat == 9 ? strtoupper($request->note_tempat_cat) : $request->note_tempat ),
            'ip' => $request->ip(),
        ]);

        foreach( $request->otr_id as $otr_id ){
            Rombongan::create([
                'id_pendatang' => $data->id,
                'nama' => strtoupper($request->otr_nama[$otr_id]),
                'umur' => $request->otr_umur[$otr_id],
                'status' => strtoupper($request->otr_stat[$otr_id]),
                'kes1' => $request->otr_sehat[$otr_id][1],
                'kes2' => $request->otr_sehat[$otr_id][2],
                'kes3' => $request->otr_sehat[$otr_id][3],
                'kes4' => $request->otr_sehat[$otr_id][4],
                'kes5' => $request->otr_sehat[$otr_id][5],
                'kes6' => $request->otr_sehat[$otr_id][6],
                'kes7' => $request->otr_sehat[$otr_id][7],
                'kes8' => $request->otr_sehat[$otr_id][8],
                'kes9' => $request->otr_sehat[$otr_id][9],
                'sakit' => strtoupper($request->otr_sakit[$otr_id])
            ]); 
        }
        
        if ( $foto_file = $request->file('foto') ) {
            if ( $foto_name = PublicController::insert_file($foto_file) ) {
				Pendatang::where('id', $data->id)->update([ 'foto' => $foto_name ]);
            }
        }
        
        return back()->with('stat','sip');
    }
	
	public static function insert_file( $file ) {
		if ( !$file )
			return false;
		
		$uid = strtotime("now");
		$file_up_name = $file->getClientOriginalName();
		$file_up_parts = pathinfo($file_up_name);
		$file_ext = $file_up_parts['extension'];
		$file_name = sprintf('%2$s-%1$s', PublicController::filename($file_up_parts['filename']), $uid);
		$file_name_full = sprintf('%1$s.%2$s', $file_name, $file_ext);
		if ( $file->move('uploads/', $file_name_full) ) {
			return $file_name_full;
		} else {
			return false;
		}
	}
    
	public static function filename( $text = '' ) {
		if ( !$text )
			return false;
		return preg_replace( '/[^a-zA-Z0-9_\-]/', '_', $text );
	}
}