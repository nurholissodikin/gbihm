<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kehadiranabsensi extends Model
{
    //
    protected $table = 'kk_absensi_kehadiran';
    protected $primaryKey = 'id';
    protected $fillable = [
    'idkehadiran',
    'idmurid',
	'kehadiran',
	'usercreated',
	'userupdated'];

	public function komkehadiran()
	{
		return $this->belongsTo('App\Komkehadiran','idkehadiran','id');
	}
	public function murid()
	{
		return $this->belongsTo('App\Murid','idmurid','id');
	}
}
