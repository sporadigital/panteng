<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Request;

class Pendatang extends Model {
	protected $table = 'pendatang';

	protected $fillable = [ 'sender_fname', 'sender_nname', 'sender_nik', 'sender_address', 'sender_phone', 'object_fname', 'object_nname', 'object_nik', 'object_umur', 'object_alasal', 'object_kerja', 'object_alkerja', 'object_nope', 'object_jumlah', 'note_asal', 'note_branglok', 'note_brangwak', 'note_singgah', 'note_tiba', 'note_moda', 'note_tinggal', 'note_tempat', 'foto', 'ip', 'status' ];

}