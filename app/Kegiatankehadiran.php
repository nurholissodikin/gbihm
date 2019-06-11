<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kegiatankehadiran extends Model
{
    //
    protected $table = 'kegiatan_kehadiran';
   	protected $primaryKey = 'id';
   	protected $fillable  = [
   	'idkegiatan',
	'dewasa',
	'diakonis',
	'wl',
	'pemusik',
	'aktivis',
	'diaken',
	'pengerja',
	'singer',
	'pendoa',
	'catatan',
	'tema',
	'usercreated',
	'userupdated',
	'status'];

	public function kegiatan()
	{
		return $this->belongsTo('App\Kegiatan','idkegiatan','id');
	}
}
