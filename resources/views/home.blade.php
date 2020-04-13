@extends('layouts.app')

@section('content')
<div class="container">
    <div class="jumbotron bg-transparent p-0">
        <h1 class="display-4 mb-0">Ganti Sandi</h1>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="m-0">ADMIN</h5>
                </div>
                <div class="card-body">

                    <div class="form-group">
                        <label for="a-uname">Username</label>
                        <input type="text" id="a-uname" class="form-control text-monospace" value="{{ preg_replace('/@spora.id/', '', $admin->email) }}" disabled />
                    </div>
                    <div class="form-group">
                        <label for="note-asal">Password</label>
                        <input type="text" name="note_asal" id="note-asal" class="form-control" required />
                    </div>
                </div>
                <div class="card-footer bg-transparent">
                    <button class="btn btn-primary">SIMPAN</button>
                </div>
            </div>
        </div>
        <div class="col-md-6">
        <div class="card">
                <div class="card-header">
                    <h5 class="m-0">TAMU</h5>
                </div>
                <div class="card-body">


                    <div class="form-group">
                        <label for="g-uname">Username</label>
                        <input type="text" id="g-uname" class="form-control text-monospace" value="{{ preg_replace('/@spora.id/', '', $guest->email) }}" disabled />
                    </div>
                    <div class="form-group">
                        <label for="note-asal">Password</label>
                        <input type="text" name="note_asal" id="note-asal" class="form-control" required />
                    </div>
                </div>
                <div class="card-footer bg-transparent">
                    <button class="btn btn-primary">SIMPAN</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection