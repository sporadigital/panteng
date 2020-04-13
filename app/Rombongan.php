<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Request;

class Rombongan extends Model {
	protected $table = 'rombongan';

	protected $fillable = [ 'id_pendatang', 'nama', 'umur', 'status', 'kes1', 'kes2', 'kes3', 'kes4', 'kes5', 'kes6', 'kes7', 'kes8', 'kes9', 'sakit' ];

	public $timestamps = false;
}