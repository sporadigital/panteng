@extends('layouts.app')


@section('content')
<div class="container">
    <div class="jumbotron bg-transparent p-0">
        <h1 class="display-4 mb-0">Data Masuk</h1>
        <p class="lead">Biodata Pendatang/Pemudik/Tamu</p>
    </div>

    <!-- <div class="table-responsive"> -->
    <table id="table" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th rowspan="2">NO</th>
                <th colspan="5">PENGINPUT</th>
                <th colspan="9">KEPALA KELUARGA</th>
                <th colspan="8">RIWAYAT PERJALANAN</th>
                <th rowspan="2">DIKIRIM</th>
                <!-- <th rowspan="2">STATUS</th>
                <th rowspan="2">IP PENGIRIM</th> -->
            </tr>
            <tr>
                <th>NAMA LENGKAP</th>
                <th>NAMA PANGGILAN</th>
                <th>NIK</th>
                <th>ALAMAT</th>
                <th>NO HP</th>

                <th>NAMA LENGKAP</th>
                <th>NAMA PANGGILAN</th>
                <th>NIK</th>
                <th>UMUR</th>
                <th>ALAMAT ASAL</th>
                <th>PEKERJAAN</th>
                <th>ALAMAT KERJA</th>
                <th>NO HP</th>
                <th>JUMLAH ANG. KEL.</th>

                <th>ASAL KOTA</th>
                <th>LOKASI BERANGKAT</th>
                <th>WAKTU BERANGKAT</th>
                <th>TEMPAT SINGGAH</th>
                <th>WAKTU TIBA</th>
                <th>MODA TRANS.</th>
                <th>ALAMAT TINGGAL</th>
                <th>STATUS TEMPAT TINGGAL</th>
            </tr>
            <!-- <tr>
                <th>NO</th>

                <th>PENGINPUT NAMA LENGKAP</th>
                <th>PENGINPUT NAMA PANGGILAN</th>
                <th>PENGINPUT NIK</th>
                <th>PENGINPUT ALAMAT</th>
                <th>PENGINPUT NO HP</th>

                <th>KEP. KEL. NAMA LENGKAP</th>
                <th>KEP. KEL. NAMA PANGGILAN</th>
                <th>KEP. KEL. NIK</th>
                <th>KEP. KEL. UMUR</th>
                <th>KEP. KEL. ALAMAT ASAL</th>
                <th>KEP. KEL. PEKERJAAN</th>
                <th>KEP. KEL. ALAMAT KERJA</th>
                <th>KEP. KEL. NO HP</th>
                <th>KEP. KEL. JUMLAH ANG. KEL.</th>

                <th>RIWAYAT PERJ. ASAL KOTA</th>
                <th>RIWAYAT PERJ. LOKASI BERANGKAT</th>
                <th>RIWAYAT PERJ. WAKTU BERANGKAT</th>
                <th>RIWAYAT PERJ. TEMPAT SINGGAH</th>
                <th>RIWAYAT PERJ. WAKTU TIBA</th>
                <th>RIWAYAT PERJ. MODA TRANS.</th>
                <th>RIWAYAT PERJ. ALAMAT TINGGAL</th>
                <th>RIWAYAT PERJ. STATUS TEMPAT TINGGAL</th>

                <th>DIKIRIM</th>
                <th>STATUS</th>
                <th>IP PENGIRIM</th>
            </tr> -->
        </thead>
        <tbody>
            @if( count($datas) )
            @foreach( $datas as $idx=>$data )
            <tr data-id="{{ $data->id }}">
                <td>{{ $idx+1 }}</td>

                <td>{{ strtoupper($data->sender_fname) }}</td>
                <td>{{ strtoupper($data->sender_nname) }}</td>
                <td>{{ strtoupper($data->sender_nik) }}</td>
                <td>{{ strtoupper($data->sender_address) }}</td>
                <td>{{ strtoupper($data->sender_phone) }}</td>

                <td>{{ strtoupper($data->object_fname) }}</td>
                <td>{{ strtoupper($data->object_nname) }}</td>
                <td>{{ strtoupper($data->object_nik) }}</td>
                <td>{{ strtoupper($data->object_umur) }}</td>
                <td>{{ strtoupper($data->object_alasal) }}</td>
                <td>{{ strtoupper($data->object_kerja) }}</td>
                <td>{{ strtoupper($data->object_alkerja) }}</td>
                <td>{{ strtoupper($data->object_nope) }}</td>
                <td>{{ strtoupper($data->object_jumlah) }}</td>

                <td>{{ strtoupper($data->note_asal) }}</td>
                <td>{{ strtoupper($data->note_branglok) }}</td>
                <td>{{ strtoupper($data->note_brangwak) }}</td>
                <td>{{ strtoupper($data->note_singgah) }}</td>
                <td>{{ strtoupper($data->note_tiba) }}</td>
                <td>{{ strtoupper($data->note_moda) }}</td>
                <td>{{ strtoupper($data->note_tinggal) }}</td>
                <td>{{ strtoupper($data->note_tempat) }}</td>

                <td>{{ strtoupper($data->created_at) }}</td>
                <!-- <td>{{ strtoupper($data->status) }}</td>
                    <td>{{ strtoupper($data->ip) }}</td> -->
            </tr>
            @endforeach
            @endif
        </tbody>
        <!-- <tfoot>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
        </tfoot> -->
    </table>
    <!-- </div> -->

    <p><em>* Klik baris untuk detail data.</em></p>
    @if( 1 == Auth::user()->id )
    <p class="text-center mt-3"><a href="#" class="btn btn-primary btn-lg {{ !count($datas) ? 'disabled' : '' }}"
            onclick="event.preventDefault(); document.getElementById('unduh-form').submit();">Unduh Data</a></p>
    <form id="unduh-form" action="{{ url()->current() }}" method="POST" style="display: none;">
        @csrf
    </form>
    @endif
</div>
@endsection

@section('header')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
<style>
table tr>* {
    white-space: nowrap;
}

table thead tr>* {
    font-size: 0.75rem;
}
</style>
@endsection


@section('footer')
<!-- Modal -->
<div class="modal fade" id="detailModal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!--
        <button type="button" class="btn btn-primary">Save changes</button>
        -->
      </div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script>
jQuery(document).ready(function($) {
    $('#table').DataTable({
        "searching": false,
        "scrollX": true,
        "columnDefs": [{
            "targets": [3, 4, 8, 11, 12, 16, 17, 18, 19, 22],
            "visible": false,
        }],
        "language": {
            "emptyTable": "Belum ada data masuk",
            "info": "Menampilkan _START_ - _END_ dari _TOTAL_",
            "infoEmpty": "",
            "lengthMenu": "Tampilkan _MENU_",
            "paginate": {
                "first": "Pertama",
                "last": "Terakhir",
                "next": "Lanjut",
                "previous": "Balik"
            },
        }
    });
    $('#table tbody tr').click(function(){
        var rid = $(this).data('id');
        //$('#detailModal').modal('show');
        $.ajax({
    		url: "{{ route('detail') }}",
    		dataType: 'json',
    		data: {
    			id: rid
    		},
    		success: function(data){
    		    $(data).appendTo( $('#detailModal .modal-body') );
    			$('#detailModal').modal('show');
    		}
    	});
    });
});

$('#detailModal').on('hidden.bs.modal', function(e) {
    $(this).find('.modal-body').empty();
});
</script>
@endsection