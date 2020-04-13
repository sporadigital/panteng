@extends('layouts.app')

@section('content')
<div class="container">
    <div class="jumbotron bg-transparent p-0 my-2">
        <h1 class="display-4 font-weight-bold">Pantau Pemudik/Pendatang</h1>
        <p class="h4 font-weight-normal">{{ config('settings.fullname', '') }}</p>
        <hr class="my-4">
        <div class="row flex-column pt-2">
            <div class="col-md-6 my-2">
                <p class="lead mb-2">Anda mengetahui kedatangan pendatang/pemudik?</p>
                <p>
                    <a class="btn btn-primary btn-lg" href="{{ route('form') }}" role="button">Kirim Datanya</a>
                </p>
            </div>
            <div class="col-md-6 my-2">
                <p class="lead mb-2"><em class="text-danger">Atau,</em> Anda adalah pendatang/pemudik<!-- di {{ config('settings.name', '') }} -->?</p>
                <p>
                    <a class="btn btn-primary btn-lg" href="{{ route('form') }}" role="button">Isi Biodata</a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection