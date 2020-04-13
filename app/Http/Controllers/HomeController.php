<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pendatang;
use App\Rombongan;
use App\User;
use App\Exports\DataExport;
use Maatwebsite\Excel\Facades\Excel;
use Auth;

class HomeController extends Controller {
    
    public function __construct() {
        $this->middleware('auth');
    }
    
    public function index() {
        if( 1 != Auth::user()->id )
            abort(403);

        return view('home', ['admin' => User::where('id', 1)->first(), 'guest' => User::where('id', 2)->first()]);
    }
    
    public function table() {
        return view('table', ['datas' => Pendatang::get()]);
    }
    
    public function table_unduh() {
        if( 1 != Auth::user()->id )
            abort(403);

        $ndate = date('Y-m-d_H-i-s');
        return Excel::download(new DataExport, 'data_pemudik_'. $ndate .'.xlsx');
    }
    
    public function detail(Request $request) {
        $data = Pendatang::where('id', $request->id)->first();
        if ( !$data )
            abort(404);
            
		$html = '
		    <h5>BIODATA KEPALA KELUARGA/ KETUA ROMBONGAN</h5>
			<table class="table table-sm border-bottom">
				<tr>
					<td style="width:15rem">NAMA LENGKAP</td>
					<th>'. $data->object_fname .'</th>
				</tr>
				<tr>
					<td>NAMA PANGGILAN</td>
					<th>'. $data->object_nname .'</th>
				</tr>
				<tr>
					<td>NIK</td>
					<th>'. $data->object_nik .'</th>
				</tr>
				<tr>
					<td>UMUR</td>
					<th>'. $data->object_umur .' tahun</th>
				</tr>
				<tr>
					<td>ALAMAT ASAL</td>
					<th>'. $data->object_alasal .'</th>
				</tr>
				<tr>
					<td>PEKERJAAN</td>
					<th>'. $data->object_kerja .'</th>
				</tr>
				<tr>
					<td>ALAMAT KERJA</td>
					<th>'. $data->object_alkerja .'</th>
				</tr>
				<tr>
					<td>NO HP</td>
					<th>'. $data->object_nope .'</th>
				</tr>
				<tr>
					<td>JUMLAH ANGGOTA KELUARGA <br>YANG IKUT (TERMASUK KPL <br>KELUARGA/KETUA ROMB)</td>
					<th>'. $data->object_jumlah .'</th>
				</tr>
			</table>
		';
            
		$html .= '
		    <h5>RIWAYAT PERJALANAN</h5>
			<table class="table table-sm border-bottom">
				<tr>
					<td style="width:15rem">MUDIK/ ASAL DARI KOTA</td>
					<th>'. $data->note_asal .'</th>
				</tr>
				<tr>
					<td>LOKASI PEMBERANGKATAN</td>
					<th>'. $data->note_branglok .'</th>
				</tr>
				<tr>
					<td>WAKTU PEMBERANGKATAN</td>
					<th>'. $data->note_brangwak .'</th>
				</tr>
				<tr>
					<td>TEMPAT YANG DISINGGAHI <br>DALAM PERJALANAN</td>
					<th>'. $data->note_singgah .'</th>
				</tr>
				<tr>
					<td>WAKTU TIBA</td>
					<th>'. $data->note_tiba .'</th>
				</tr>
				<tr>
					<td>MODA TRANSPORTASI</td>
					<th>'. $data->note_moda .'</th>
				</tr>
				<tr>
					<td>ALAMAT TINGGAL SAAT INI <br>DI LOKASI</td>
					<th>'. $data->note_tinggal .'</th>
				</tr>
				<tr>
					<td>STATUS TEMPAT TINGGAL <br>YANG DI TEMPATI</td>
					<th>'. $data->note_tempat .'</th>
				</tr>
			</table>
		';
			
		$html .= '
		    <h5>KONDISI KESEHATAN SELURUH ANGGOTA ROMBONGAN/KELUARGA YANG DATANG/ MUDIK</h5>
		    <div class="table-responsive mb-3">
			<table class="table table-sm border-bottom mb-0">
			    <thead>
			        <tr>
			            <th>NO</th>
			            <th>NAMA</th>
			            <th>UMUR</th>
			            <th class="text-nowrap" style="line-height:1">STATUS<br><small>DLM KELUARGA</small></th>
			            <th>DEMAM</th>
			            <th>BATUK</th>
			            <th>SESAK NAPAS</th>
			            <th style="line-height:1"><small>SAKIT</small><br>TENGGOROKAN</th>
			            <th>ANOSMIA</th>
			            <th>AGEUSIA</th>
			            <th class="text-nowrap" style="line-height:1"><small>GUNAKAN</small><br>MASKER</th>
			            <th class="text-nowrap" style="line-height:1"><small>GUNAKAN</small><br>HAND SANITIZER</th>
			            <th class="text-nowrap" style="line-height:1">CUCI TANGAN<br><small>DG SABUN</small></th>
			            <th class="text-nowrap">RIWAYAT PENYAKIT</th>
			        </tr>
			    </thead>
		';
		
        $anggota = Rombongan::where('id_pendatang', $data->id)->get();
		foreach ( $anggota as $idx=>$angg )	{
    		$html .= '
				<tr>
					<td>'. ($idx+1) .'</td>
					<th class="text-nowrap">'. $angg->nama .'</th>
					<td>'. $angg->umur .'</td>
					<td class="text-nowrap">'. $angg->status .'</td>
					<td>'. ($angg->kes1 ? 'Y' : 'T') .'</td>
					<td>'. ($angg->kes2 ? 'Y' : 'T') .'</td>
					<td>'. ($angg->kes3 ? 'Y' : 'T') .'</td>
					<td>'. ($angg->kes4 ? 'Y' : 'T') .'</td>
					<td>'. ($angg->kes5 ? 'Y' : 'T') .'</td>
					<td>'. ($angg->kes6 ? 'Y' : 'T') .'</td>
					<td>'. ($angg->kes7 ? 'Y' : 'T') .'</td>
					<td>'. ($angg->kes8 ? 'Y' : 'T') .'</td>
					<td>'. ($angg->kes9 ? 'Y' : 'T') .'</td>
					<td>'. $angg->sakit .'</td>
				</tr>
    		';
		}
				
		$html .= '
			</table>
			</div>
		';
			
		$html .= '
		    <h5>DATA PENGINPUT</h5>
			<table class="table table-sm border-bottom mb-0">
				<tr>
					<td style="width:15rem">NAMA LENGKAP</td>
					<th>'. $data->sender_fname .'</th>
				</tr>
				<tr>
					<td>NAMA PANGGILAN</td>
					<th>'. $data->sender_nname .'</th>
				</tr>
				<tr>
					<td>NIK</td>
					<th>'. $data->sender_nik .'</th>
				</tr>
				<tr>
					<td>ALAMAT</td>
					<th>'. $data->sender_address .'</th>
				</tr>
				<tr>
					<td>NO HP</td>
					<th>'. $data->sender_phone .'</th>
				</tr>
			</table>
		';
		$content = json_encode($html);
		return response($content)->header('Content-Type', 'application/json');
    }

    
}