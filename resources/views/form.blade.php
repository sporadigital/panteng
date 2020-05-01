@extends('layouts.app')

@section('content')
<div class="container">

    @if(session('stat'))

    <div class="jumbotron text-center bg-custom">
        <h5 class="display-4 mb-0">Data Terkirim</h1>
            <p class="lead">Terima kasih atas partisipasinya</p>
            <p class="mb-0"><a class="btn btn-primary btn-lg" href="{{ route('form') }}" role="button">Kirim Lagi</a>
            </p>
    </div>

    @else

    <div class="jumbotron bg-transparent p-0">
        <h1 class="display-4 mb-0">Kirim Data</h1>
        <p class="lead">Biodata Pendatang/Pemudik/Tamu</p>
    </div>

    <div class="card mb-3">
        <form id="advanced-form" method="post" action="{{ url()->current() }}" enctype="multipart/form-data">
            @csrf
            <h3 class="d-none">PENGINPUT</h3>
            <fieldset>
                <legend>DATA PENGINPUT</legend>

                <div class="form-group">
                    <label for="sender-fname">NAMA LENGKAP</label>
                    <input type="text" name="sender_fname" id="sender-fname" class="form-control text-uppercase" minlength="3"
                        required />
                </div>
                <div class="form-group">
                    <label for="sender-nname">NAMA PANGGILAN</label>
                    <input type="text" name="sender_nname" id="sender-nname" class="form-control text-uppercase" minlength="3"
                        required />
                </div>
                <div class="form-group">
                    <label for="sender-nik">NIK</label>
                    <input type="text" name="sender_nik" id="sender-nik" class="form-control nikfield" />
                </div>
                <div class="form-group">
                    <label for="sender-address">ALAMAT</label>
                    <input type="text" name="sender_address" id="sender-address" class="form-control text-uppercase" minlength="3"
                        required />
                </div>
                <div class="form-group">
                    <label for="sender-phone">NO HP</label>
                    <input type="text" name="sender_phone" id="sender-phone" class="form-control phonefield" required />
                </div>
            </fieldset>

            <h3 class="d-none">KEPALA KEL.</h3>
            <fieldset>
                <legend>BIODATA KEPALA KELUARGA / KETUA ROMBONGAN</legend>

                <div class="form-group">
                    <label for="object-fname">NAMA LENGKAP</label>
                    <input type="text" name="object_fname" id="object-fname" class="form-control text-uppercase" minlength="3"
                        required />
                </div>
                <div class="form-group">
                    <label for="object-nname">NAMA PANGGILAN</label>
                    <input type="text" name="object_nname" id="object-nname" class="form-control text-uppercase" />
                </div>
                <div class="form-group">
                    <label for="object-nik">NIK</label>
                    <input type="text" name="object_nik" id="object-nik" class="form-control nikfield" required />
                </div>
                <div class="form-group">
                    <label for="object-umur">UMUR</label>
                    <div class="input-group">
                        <input type="number" min="17" name="object_umur" id="object-umur" class="form-control"
                            required />
                        <div class="input-group-append">
                            <span class="input-group-text">tahun</span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="object-alasal">ALAMAT ASAL</label>
                    <input type="text" name="object_alasal" id="object-alasal" class="form-control text-uppercase" minlength="3"
                        required />
                </div>
                <div class="form-group">
                    <label for="object-kerja">PEKERJAAN</label>
                    <input type="text" name="object_kerja" id="object-kerja" class="form-control text-uppercase" minlength="3"
                        required />
                </div>
                <div class="form-group">
                    <label for="object-alkerja">ALAMAT KERJA</label>
                    <input type="text" name="object_alkerja" id="object-alkerja" class="form-control text-uppercase" />
                </div>
                <div class="form-group">
                    <label for="object-nope">NO HP</label>
                    <input type="text" name="object_nope" id="object-nope" class="form-control phonefield" minlength="3" required />
                </div>
                <div class="form-group">
                    <label for="object-jumlah">JUMLAH ANGGOTA KELUARGA YANG IKUT <small>(TERMASUK KPL KELUARGA/KETUA
                            ROMB)</small></label>
                    <div class="input-group">
                        <input type="number" min="1" name="object_jumlah" id="object-jumlah" class="form-control"
                            required />
                        <div class="input-group-append">
                            <span class="input-group-text">jiwa</span>
                        </div>
                    </div>
                </div>
            </fieldset>

            <h3 class="d-none">RIWAYAT</h3>
            <fieldset>
                <legend>RIWAYAT PERJALANAN</legend>

                <div class="form-group">
                    <label for="note-asal">MUDIK/ ASAL DARI KOTA</label>
                    <input type="text" name="note_asal" id="note-asal" class="form-control text-uppercase" minlength="3" required />
                </div>
                <div class="form-group">
                    <label for="note-branglok">LOKASI PEMBERANGKATAN</label>
                    <input type="text" name="note_branglok" id="note-branglok" class="form-control text-uppercase" minlength="3"
                        required />
                </div>
                <div class="form-group">
                    <label for="note-brangwak">WAKTU PEMBERANGKATAN</label>
                    <input type="text" name="note_brangwak" id="note-brangwak" class="form-control dtpick" autocomplete="off" required />
                </div>
                <div class="form-group">
                    <label for="note-singgah">TEMPAT YANG DISINGGAHI DALAM PERJALANAN</label>
                    <input type="text" name="note_singgah" id="note-singgah" class="form-control text-uppercase" minlength="3"
                        required />
                </div>
                <div class="form-group">
                    <label for="note-tiba">WAKTU TIBA</label>
                    <input type="text" name="note_tiba" id="note-tiba" class="form-control dtpick" autocomplete="off" required />
                </div>
                <div class="form-group">
                    <label for="note-moda">MODA TRANSPORTASI</label>
                    <input type="text" name="note_moda" id="note-moda" class="form-control text-uppercase" minlength="3" required />
                </div>
                <div class="form-group">
                    <label for="note-tinggal">ALAMAT TINGGAL SAAT INI DI LOKASI</label>
                    <input type="text" name="note_tinggal" id="note-tinggal" class="form-control text-uppercase" minlength="3"
                        required />
                </div>
                <div class="form-group">
                    <label for="note-tempat">STATUS TEMPAT TINGGAL YANG DI TEMPATI</label>
                    <ul class="list-unstyled ml-2 mb-0">
                        <li>
                            <div class="custom-control custom-radio">
                                <input type="radio" value="RUMAH SENDIRI" name="note_tempat" id="note-tempat1"
                                    class="custom-control-input" required />
                                <label class="custom-control-label" for="note-tempat1">RUMAH SENDIRI</label>
                            </div>
                        </li>
                        <li>
                            <div class="custom-control custom-radio">
                                <input type="radio" value="RUMAH ORANG TUA" name="note_tempat" id="note-tempat2"
                                    class="custom-control-input" required />
                                <label class="custom-control-label" for="note-tempat2">RUMAH ORANG TUA</label>
                            </div>
                        </li>
                        <li>
                            <div class="custom-control custom-radio">
                                <input type="radio" value="RUMAH SAUDARA" name="note_tempat" id="note-tempat3"
                                    class="custom-control-input" required />
                                <label class="custom-control-label" for="note-tempat3">RUMAH SAUDARA</label>
                            </div>
                        </li>
                        <li>
                            <div class="custom-control custom-radio">
                                <input type="radio" value="TEMPAT ISOLASI/KARANTINA" name="note_tempat" id="note-tempat4"
                                    class="custom-control-input" required />
                                <label class="custom-control-label" for="note-tempat4">TEMPAT ISOLASI/KARANTINA</label>
                            </div>
                        </li>
                        <li>
                            <div class="custom-control custom-radio">
                                <input type="radio" value="9" name="note_tempat" id="note-tempat9"
                                    class="custom-control-input" required />
                                <label class="custom-control-label" for="note-tempat9">
                                    <input type="text" name="note_tempat_cat" id="note-tempat9a"
                                        class="form-control form-control-sm text-uppercase" />
                                </label>
                            </div>
                        </li>
                    </ul>

                </div>
            </fieldset>

            <h3 class="d-none">ANGGOTA</h3>
            <fieldset>
                <legend>KONDISI KESEHATAN SELURUH ANGGOTA ROMBONGAN/KELUARGA YANG DATANG/ MUDIK</legend>

                <ul class="list-group list-anggota">
                </ul>
            </fieldset>

            <h3 class="d-none">FOTO</h3>
            <fieldset>
                <div class="foto-wrapper">
                    <input type="file" name="foto" class="dropify" data-allowed-file-extensions="jpg jpeg" data-max-file-size="2M" data-height="200" />
                </div>
            </fieldset>

        </form>
    </div>

    <ul id="master-anggota" class="d-none">
        <li class="list-group-item">
            <input type="hidden" name="otr_id[]" value="___numb___" />
            <div class="form-group">
                <label for="other-nama-___numb___">NAMA</label>
                <input type="text" name="otr_nama[___numb___]" id="other-nama-___numb___"
                    class="form-control text-uppercase" minlength="3" required />
            </div>
            <div class="form-group">
                <label for="other-umur-___numb___">UMUR</label>
                <div class="input-group">
                    <input type="number" min="1" name="otr_umur[___numb___]" id="other-umur-___numb___"
                        class="form-control" required />
                    <div class="input-group-append">
                        <span class="input-group-text">tahun</span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="other-status-___numb___">STATUS DALAM KELUARGA/ ROMBONGAN</label>
                <input type="text" name="otr_stat[___numb___]" id="other-status-___numb___"
                    class="form-control text-uppercase" minlength="3" required />
            </div>
            <h6>KONDISI KESEHATAN</h6>
            <div class="row mb-2">
                <div class="col">
                    DEMAM
                </div>
                <div class="col-sm-auto">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" name="otr_sehat[___numb___][1]" value="1" id="other-demam-___numb___-1"
                            class="custom-control-input" />
                        <label class="custom-control-label" for="other-demam-___numb___-1">YA</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" name="otr_sehat[___numb___][1]" value="0" id="other-demam-___numb___-2"
                            class="custom-control-input" checked />
                        <label class="custom-control-label" for="other-demam-___numb___-2">TIDAK</label>
                    </div>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col">
                    BATUK
                </div>
                <div class="col-sm-auto">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" name="otr_sehat[___numb___][2]" value="1" id="other-batuk-___numb___-1"
                            class="custom-control-input" />
                        <label class="custom-control-label" for="other-batuk-___numb___-1">YA</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" name="otr_sehat[___numb___][2]" value="0" id="other-batuk-___numb___-2"
                            class="custom-control-input" checked />
                        <label class="custom-control-label" for="other-batuk-___numb___-2">TIDAK</label>
                    </div>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col">
                    SESAK NAPAS
                </div>
                <div class="col-sm-auto">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" name="otr_sehat[___numb___][3]" value="1" id="other-sesak-___numb___-1"
                            class="custom-control-input" />
                        <label class="custom-control-label" for="other-sesak-___numb___-1">YA</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" name="otr_sehat[___numb___][3]" value="0" id="other-sesak-___numb___-2"
                            class="custom-control-input" checked />
                        <label class="custom-control-label" for="other-sesak-___numb___-2">TIDAK</label>
                    </div>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col">
                    SAKIT TENGGOROKAN
                </div>
                <div class="col-sm-auto">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" name="otr_sehat[___numb___][4]" value="1" id="other-tgorok-___numb___-1"
                            class="custom-control-input" />
                        <label class="custom-control-label" for="other-tgorok-___numb___-1">YA</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" name="otr_sehat[___numb___][4]" value="0" id="other-tgorok-___numb___-2"
                            class="custom-control-input" checked />
                        <label class="custom-control-label" for="other-tgorok-___numb___-2">TIDAK</label>
                    </div>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col text-uppercase">
                    Anosmia (Hilang Daya Penciuman)
                </div>
                <div class="col-sm-auto">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" name="otr_sehat[___numb___][5]" value="1" id="other-anosmia-___numb___-1"
                            class="custom-control-input" />
                        <label class="custom-control-label" for="other-anosmia-___numb___-1">YA</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" name="otr_sehat[___numb___][5]" value="0" id="other-anosmia-___numb___-2"
                            class="custom-control-input" checked />
                        <label class="custom-control-label" for="other-anosmia-___numb___-2">TIDAK</label>
                    </div>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col text-uppercase">
                    Ageusia (Hilang Daya Perasa Terhadap Makanan)
                </div>
                <div class="col-sm-auto">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" name="otr_sehat[___numb___][6]" value="1" id="other-ageusia-___numb___-1"
                            class="custom-control-input" />
                        <label class="custom-control-label" for="other-ageusia-___numb___-1">YA</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" name="otr_sehat[___numb___][6]" value="0" id="other-ageusia-___numb___-2"
                            class="custom-control-input" checked />
                        <label class="custom-control-label" for="other-ageusia-___numb___-2">TIDAK</label>
                    </div>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col">
                    MENGGUNAKAN MASKER DLM PERJALAN
                </div>
                <div class="col-sm-auto">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" name="otr_sehat[___numb___][7]" value="1" id="other-masker-___numb___-1"
                            class="custom-control-input" />
                        <label class="custom-control-label" for="other-masker-___numb___-1">YA</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" name="otr_sehat[___numb___][7]" value="0" id="other-masker-___numb___-2"
                            class="custom-control-input" checked />
                        <label class="custom-control-label" for="other-masker-___numb___-2">TIDAK</label>
                    </div>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col">
                    MENGGUNAKAN HAND SANITIZER DI PERJALANAN
                </div>
                <div class="col-sm-auto">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" name="otr_sehat[___numb___][8]" value="1" id="other-hsand-___numb___-1"
                            class="custom-control-input" />
                        <label class="custom-control-label" for="other-hsand-___numb___-1">YA</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" name="otr_sehat[___numb___][8]" value="0" id="other-hsand-___numb___-2"
                            class="custom-control-input" checked />
                        <label class="custom-control-label" for="other-hsand-___numb___-2">TIDAK</label>
                    </div>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col">
                    MELAKUKAN CUCI TANGAN DG SABUN DALAM PERJALANAN
                </div>
                <div class="col-sm-auto">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" name="otr_sehat[___numb___][9]" value="1" id="other-ctangan-___numb___-1"
                            class="custom-control-input" />
                        <label class="custom-control-label" for="other-ctangan-___numb___-1">YA</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" name="otr_sehat[___numb___][9]" value="0" id="other-ctangan-___numb___-2"
                            class="custom-control-input" checked />
                        <label class="custom-control-label" for="other-ctangan-___numb___-2">TIDAK</label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="other-sakit-___numb___">RIWAYAT PENYAKIT LAIN</label>
                <input type="text" name="otr_sakit[___numb___]" id="other-sakit-___numb___"
                    class="form-control text-uppercase" />
            </div>
        </li>
    </ul>

    @endif

</div>
@endsection


@section('header')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/smartwizard@4.4.1/dist/css/smart_wizard.min.css">
<style>
.list-anggota {
    counter-reset: item;
}

.list-anggota>li {
    counter-increment: item;
}

.list-anggota>li::before {
    content: counter(item);
    display: inline-block;
    padding: 0.3em 0.5em;
    font-weight: bold;
    font-size: 0.8rem;
    line-height: 1;
    color: var(--white);
    background: var(--primary);
    border-radius: 2px;
    position: absolute;
    left: -0.5rem;
}

.steps .nav-link {
    font-size: 0.85em;
}
@media (max-width: 767px) {
    .steps .nav-link {
        font-size: 0.8em;
        padding-left: 0.5em;
        padding-right: 0.5em;
    }
}

.foto-wrapper {
    max-width: 300px;
    margin: auto;
}
.dropify-wrapper {
    font-size: 12px;
    line-height: 1.5;
}
</style>
@endsection


@section('footer')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/inputmask/4.0.9/jquery.inputmask.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-steps/1.1.0/jquery.steps.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
<script type="text/javascript">
var _dropify_messages = {
	'default': 'Tarik dan jatuhkan berkas di sini atau klik',
	'replace': 'Tarik dan jatuhkan berkas atau klik untuk mengganti',
	'remove': 'Hapus',
	'error': 'Ups, terjadi kesalahan.'
}
var _dropify_error = {
	'fileSize': 'Ukuran berkas terlalu besar (maks. {'+'{ value }}b).',
	'minWidth': 'Lebar gambar terlalu kecil (min. {'+'{ value }}px).',
	'maxWidth': 'Lebar gambar terlalu besar (maks. {'+'{ value }}px).',
	'minHeight': 'Tinggi gambar terlalu kecil (min. {'+'{ value }}px).',
	'maxHeight': 'Tinggi gambar terlalu besar (maks. {'+'{ value }}px).',
	'imageFormat': 'Format gambar tidak diijinkan (hanya {'+'{ value }}).',
	'fileExtension': 'Berkas tidak diijinkan (hanya {'+'{ value }}).'
}
jQuery.datetimepicker.setLocale('id');
jQuery.validator.addMethod("nik", function(value, element) {
    var cek = /^((\d{6})-(\d{6})-(\d{4}))$/.test(value); 
    return cek;
}, "NIK tidak valid");
jQuery.validator.addMethod("hp", function(value, element) {
    var cek = /^(08(\d{2}) (\d{4}) (\d{2,5}))$/.test(value); 
    return cek;
}, "No HP tidak valid");
jQuery.validator.setDefaults({
    errorElement: 'span',
    errorPlacement: function(error, element) {
        error.addClass('invalid-feedback d-none');
        element.closest('.form-group').append(error);
    },
    highlight: function(element, errorClass, validClass) {
        $(element).addClass('is-invalid');
    },
    unhighlight: function(element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
    },
});
var form = $("#advanced-form").show();
form.steps({
    headerTag: "h3",
    bodyTag: "fieldset",
    labels: {
        finish: "Kirim",
        next: "Lanjut",
        previous: "Kembali",
    },
    onInit: function(event, currentIndex) {
        loadSender();
        form.find('.content').addClass('card-body');
        form.find('.steps').addClass('card-header');
        form.find('.steps ul').addClass('nav nav-pills card-header-tabs');
        form.find('.steps li').addClass('nav-item');
        form.find('.actions').addClass('card-footer bg-transparent');
        form.find('.steps a').each(function() {
            $(this).addClass('nav-link');
            if ($(this).parent().hasClass('disabled')) {
                $(this).addClass('disabled');
            }
            if ($(this).parent().hasClass('current')) {
                $(this).addClass('active');
            }
        });
        form.find('.actions a').each(function() {
            $(this).addClass('btn btn-primary');
            if ($(this).parent().hasClass('disabled')) {
                $(this).addClass('disabled');
            }
            if ($(this).parent().is(':first-child')) {
                $(this).addClass('btn-sm');
            }
            if ($(this).parent().is(':last-child')) {
                $(this).addClass('btn-lg text-uppercase');
            }
        });
        form.find('.dropify').dropify({
            messages: _dropify_messages,
            error: _dropify_error
        });

        $('.nikfield').inputmask({"mask": "999999-999999-9999"});
        $('.phonefield').inputmask({"mask": "9999 9999 9{2,5}"});

        $('.dtpick').each(function(){
            $(this).datetimepicker({
                maxDate: new Date()
            });
        });

        $('#note-tempat9').click(function() {
            if ($(this).is(':checked')) {
                $('#note-tempat9a').focus();
            }
        });
        $('#note-tempat9a').focus(function() {
            $('#note-tempat9')[0].click();
        });
    },
    onStepChanging: function(event, currentIndex, newIndex) {
        if (currentIndex > newIndex) {
            return true;
        }
        if (currentIndex < newIndex) {
            form.find(".body:eq(" + newIndex + ") label.error").remove();
            form.find(".body:eq(" + newIndex + ") .error").removeClass("error");
        }

        form.validate().settings.ignore = ":disabled,:hidden";
        return form.valid();
    },
    onStepChanged: function(event, currentIndex, priorIndex) {
        form.find('.steps a').each(function() {
            $(this).removeClass('disabled active');
            if ($(this).parent().hasClass('disabled')) {
                $(this).addClass('disabled');
            }
            if ($(this).parent().hasClass('current')) {
                $(this).addClass('active');
            }
        });
        form.find('.actions a').each(function() {
            $(this).removeClass('disabled');
            if ($(this).parent().hasClass('disabled')) {
                $(this).addClass('disabled');
            }
        });

        if (currentIndex == 3) {
            cloneForm();
        } else if (currentIndex < 3) {
            clearForm();
        }
    },
    onFinishing: function(event, currentIndex) {
        form.validate().settings.ignore = ":disabled";
        return form.valid();
    },
    onFinished: function(event, currentIndex) {
        saveSender();
        form.submit();
    }
}).validate({
    rules: {
        sender_phone: {
            required: true,
            hp: true
        },
        object_nik: {
            required: true,
            nik: true
        },
        object_nope: {
            required: true,
            hp: true
        }
    }
});

function saveSender() {
    localStorage.sfname = $('#sender-fname').val();
    localStorage.snname = $('#sender-nname').val();
    localStorage.snik = $('#sender-nik').val();
    localStorage.saddress = $('#sender-address').val();
    localStorage.sphone = $('#sender-phone').val();
}

function loadSender() {
    $('#sender-fname').val(localStorage.sfname);
    $('#sender-nname').val(localStorage.snname);
    $('#sender-nik').val(localStorage.snik);
    $('#sender-address').val(localStorage.saddress);
    $('#sender-phone').val(localStorage.sphone);
}

function clearForm() {
    $('.list-anggota > li').remove();
}

function cloneForm() {
    var length = $('#object-jumlah').val();
    var id = uniqId();
    var master = $('#master-anggota').clone();
    for (i = 1; i <= length; i++) {
        id = id + i;
        var added = master.html().replace(/___numb___/g, id);
        $(added).appendTo($('.list-anggota'));
    }
}

function uniqId() {
    return Math.round(new Date().getTime() + (Math.random() * 100));
}
</script>
@endsection