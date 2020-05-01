@extends('layouts.app')


@section('content')
<div class="container">
    <div class="jumbotron bg-transparent p-0">
        <h1 class="display-4 mb-0">Data Masuk</h1>
        <p class="lead">Biodata Pendatang/Pemudik/Tamu</p>
    </div>

    <table id="table" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th rowspan="2">NO</th>
                <th colspan="3">PENGINPUT</th>
                <th colspan="6">KEPALA KELUARGA</th>
                <th colspan="3">RIWAYAT PERJALANAN</th>
                <th rowspan="2">DIKIRIM</th>
            </tr>
            <tr>
                <th>NAMA LENGKAP</th>
                <th>NAMA PANGGILAN</th>
                <th>NO HP</th>

                <th>NAMA LENGKAP</th>
                <th>NAMA PANGGILAN</th>
                <th>UMUR</th>
                <th>ALAMAT ASAL</th>
                <th>NO HP</th>
                <th>JUMLAH ANG. KEL.</th>

                <th>ASAL KOTA</th>
                <th>MODA TRANS.</th>
                <th>ALAMAT TINGGAL</th>
            </tr>
        </thead>
    </table>

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
<div class="modal fade" id="detailModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
                @if( 1 == Auth::user()->id )
                <button type="button" class="btn btn-danger order-first mr-auto">Hapus</button>
                @endif
            </div>
        </div>
    </div>
</div>
@if( 1 == Auth::user()->id )
<div class="modal fade" id="notifModal" tabindex="-2" role="dialog">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h2 class="display-4 text-center my-4">Data telah dihapus.</h2>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
@endif

<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script>
var table = $('#table').DataTable({
    "ajax": "{{ route('data') }}",
    "searching": false,
    "scrollX": true,
    "rowId": 'id',
    "columnDefs": [ {
        "targets": [3,8],
        "orderable": false
    } ],
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
$('#table').on('click', 'tr', function() {
    var rid = $(this).attr('id').match(/\d+/);
    $.ajax({
        url: "{{ route('detail') }}",
        dataType: 'json',
        data: {
            id: rid
        },
        success: function(data) {
            $(data).appendTo($('#detailModal .modal-body'));
            $('#detailModal .modal-footer .btn-danger').attr('onclick', 'removeData('+rid+')');
            $('#detailModal').modal('show');
        }
    });
});

$('#detailModal').on('hidden.bs.modal', function(e) {
    $(this).find('.modal-body').empty();
    $(this).find('.modal-footer .btn-danger').removeAttr('onclick');
});

@if( 1 == Auth::user()->id )
$('#notifModal').on('hidden.bs.modal', function(e) {
    table.ajax.reload(null);
});

function removeData(id) {
    if ( confirm('Yakin akan menghapus data ini?') ) {
        $('#detailModal').modal('hide');
        $.ajax({
            url: "{{ route('remove') }}",
            type: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
                id: id
            },
            success: function(data) {
                $('#notifModal').modal('show');
            }
        });
    }
}
@endif
</script>
@endsection