<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ibadahrayakehadiran extends Model
{
    //
    protected $table = 'ibadahraya_kehadiran';
   	protected $primaryKey = 'id';
   	protected $fillable  = [
   	'idibadahraya',
	'dewasa',
	'diakonis',
	'wl',
	'pemusik',
	'aktivis',
	'diaken',
	'pengerja',
	'singer',
	'pendoa',
	'sm_type',
	'guru_sm',
	'ast_gurusm',
	'batita',
	'balita',
	'pratama',
	'guru_pembina',
	'madya',
	'pe_anak',
	'jemaat',
	'catatan',
	'tema',
	'usercreated',
	'userupdated',
	'status'];

	public function ibadahraya()
	{
		return $this->belongsTo('App\Ibadahraya','idibadahraya','id');
	}
}
