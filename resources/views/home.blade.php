@extends('layouts.app')

@section('content')
<div class="container">
    <div class="jumbotron bg-transparent p-0">
        <h1 class="display-4 mb-0">Ganti Sandi</h1>
    </div>

@if( session('status') )
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {!! session('status') !!}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if( count($errors) )
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>GALAT!</strong> Gagal menyimpan perubahan.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="m-0">ADMIN</h5>
                </div>
                <div class="card-body"> 
                    <form method="post" action="{{ route('adminedit') }}" class="card-body px-4 rounded-0">
                        {{ csrf_field() }}
                        <input type="hidden" name="admin_id" value="{{ $admin->id }}" />
                        <div class="form-group">
                            <label for="a-uname">Username</label>
                            <input type="text" id="a-uname" class="form-control text-monospace" value="{{ preg_replace('/@spora.id/', '', $admin->email) }}" disabled />
                        </div>
                        <div class="form-group">
                            <label for="pass_new_admin">Password</label>
                            <input type="password" name="pass_new_admin" id="pass_new_admin" class="form-control" required />
                            @error('pass_new_admin')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        </div>
                        <div class="card-footer bg-transparent">
                            <button type="submit" class="btn btn-primary">{{ __('Simpan') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        <div class="col-md-6">
        <div class="card">
                <div class="card-header">
                    <h5 class="m-0">TAMU</h5>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('useredit') }}" class="card-body px-4 rounded-0">
                        {{ csrf_field() }}
                        <input type="hidden" name="user_id" value="{{ $guest->id }}" />
                        <div class="form-group">
                            <label for="g-uname">Username</label>
                            <input type="text" id="g-uname" class="form-control text-monospace" value="{{ preg_replace('/@spora.id/', '', $guest->email) }}" disabled />
                        </div>
                        <div class="form-group">
                            <label for="pass_new_user">Password</label>
                            <input type="password" name="pass_new_user" id="pass_new_user" class="form-control" required />
                            @error('pass_new_user')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        </div>
                        <div class="card-footer bg-transparent">
                            <button type="submit" class="btn btn-primary">{{ __('Simpan') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</div>
@endsection