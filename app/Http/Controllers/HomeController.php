<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pendatang;
use App\Rombongan;
use App\User;
use App\Exports\DataExport;
use Maatwebsite\Excel\Facades\Excel;
use Hash;
use Auth;
use File;

class HomeController extends Controller {
    
    public function __construct() {
        $this->middleware('auth');
    }
    
    public function index() {
        if( 1 != Auth::user()->id )
            abort(403);

        return view('home', ['admin' => User::where('id', 1)->first(), 'guest' => User::where('id', 2)->first()]);
    }

    public function admin_edit(Request $request) {
 		
		$admin = User::where('id', $request->admin_id)->first();
		$request->validate([
			'pass_new_admin' => 'required|min:6',
		], [
			'pass_new_admin.required' => 'Harus diisi. Minimal 6 karakter.',
			'pass_new_admin.min' => 'Minimal 6 karakter.',
		]);

        User::where('id', $request->admin_id)->update(['password' => Hash::make($request->pass_new_admin)]);
		
		return back()->with('status', '<strong>SUKSES!</strong> Kata sandi ADMIN telah diganti.');
	}

    public function user_edit(Request $request) {
		
		$user = User::where('id', $request->user_id)->first();
		$request->validate([
			'pass_new_user' => 'required|min:4',
		], [
			'pass_new_user.required' => 'Harus diisi. Minimal 4 karakter.',
			'pass_new_user.min' => 'Minimal 4 karakter.',
		]);

		User::where('id', $request->user_id)->update(['password' => Hash::make($request->pass_new_user)]);
		
		return back()->with('status', '<strong>SUKSES!</strong> Kata sandi TAMU telah diganti.');
	}
    
    public function table() {
        return view('table', ['datas' => Pendatang::get()]);
    }
    
    public function table_data() {
		$results = [];
		$datas = Pendatang::get();
		if( count($datas) ) {
			foreach( $datas as $idx=>$data ) {
				$results[] = [
					'id' => 'data-'. $data->id,
					$idx+1,
					strtoupper($data->sender_fname),
					strtoupper($data->sender_nname),
					$data->sender_phone,
					strtoupper($data->object_fname),
					strtoupper($data->object_nname),
					$data->object_umur,
					strtoupper($data->object_alasal),
					$data->object_nope,
					$data->object_jumlah,
					strtoupper($data->note_asal),
					strtoupper($data->note_moda),
					strtoupper($data->note_tinggal),
					$data->created_at->format('d M Y H:i:s')
				];
			}
		}
		
        $content = json_encode(['data' => $results]);
		return response($content)->header('Content-Type', 'application/json');
    }
    
    public function table_unduh() {
        if( 1 != Auth::user()->id )
            abort(403);

        $ndate = date('Y-m-d_H-i-s');
        return Excel::download(new DataExport, 'data_pemudik_'. $ndate .'.xlsx');
    }
    
    public function remove(Request $request) {
		$id_remove = $request->id;
        $foto = Pendatang::where('id', $id_remove)->get('foto')->first();
		Rombongan::where('id_pendatang', $id_remove)->delete();
		Pendatang::where('id', $id_remove)->delete();
        if ( $foto->foto && file_exists( public_path('uploads/' . $foto->foto) ) ) {
            File::delete( public_path('uploads/' . $foto->foto) );
        }

		$respond = 'sip';
		$content = json_encode($respond);
		return response($content)->header('Content-Type', 'application/json');
    }
    
    public function detail(Request $request) {
        $data = Pendatang::where('id', $request->id)->first();
        if ( !$data )
            abort(404);
        
        $html = '';
        $has_foto = $data->foto && file_exists( public_path('uploads/' . $data->foto) ) ? true : false;
        
        $html .= '
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#detail-biodata">BIODATA</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#detail-perjalanan">PERJALANAN</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#detail-rombongan">ROMBONGAN</a>
                </li>
        ';
        if ( $has_foto ) {
            $html .= '
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#detail-foto">FOTO</a>
                </li>
            ';
        }
        $html .= '
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#detail-penginput">PENGINPUT</a>
                </li>
            </ul>
        ';
        
		$html .= '<div class="tab-content pt-3">';
            
		$html .= '
        <div class="tab-pane fade show active" id="detail-biodata">
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
		</div>';
            
		$html .= '
        <div class="tab-pane fade" id="detail-perjalanan">
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
		</div>';
			
		$html .= '
        <div class="tab-pane fade" id="detail-rombongan">
		    <h5>KONDISI KESEHATAN SELURUH ANGGOTA ROMBONGAN/KELUARGA YANG DATANG/ MUDIK</h5>
		    <div class="table-responsive mb-3">
			<table class="table border-bottom mb-0">
			    <thead>
			        <tr>
			            <th class="py-2">NO</th>
			            <th class="py-2">NAMA</th>
			            <th class="py-2">UMUR</th>
			            <th class="py-2 text-nowrap" style="line-height:1">STATUS<br><small>DLM KELUARGA</small></th>
			            <th class="py-2">DEMAM</th>
			            <th class="py-2">BATUK</th>
			            <th class="py-2">SESAK NAPAS</th>
			            <th class="py-2" style="line-height:1"><small>SAKIT</small><br>TENGGOROKAN</th>
			            <th class="py-2">ANOSMIA</th>
			            <th class="py-2">AGEUSIA</th>
			            <th class="py-2 text-nowrap" style="line-height:1"><small>GUNAKAN</small><br>MASKER</th>
			            <th class="py-2 text-nowrap" style="line-height:1"><small>GUNAKAN</small><br>HAND SANITIZER</th>
			            <th class="py-2 text-nowrap" style="line-height:1">CUCI TANGAN<br><small>DG SABUN</small></th>
			            <th class="py-2 text-nowrap">RIWAYAT PENYAKIT</th>
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
		</div>';

        if ( $has_foto ) {
            $html .= '
            <div class="tab-pane fade" id="detail-foto">
                <h5 class="d-none">FOTO</h5>
                <figure><a href="'. url('uploads/' . $data->foto) .'" target="_blank"><img src="'. url('uploads/' . $data->foto) .'" alt="" class="img-fluid" /></a></figure>
            </div>';
        }
			
		$html .= '
        <div class="tab-pane fade" id="detail-penginput">
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
		</div>';
        
        $html .= '</div><!-- /.tab-content -->';
        
		$content = json_encode($html);
		return response($content)->header('Content-Type', 'application/json');
    }

    
}
