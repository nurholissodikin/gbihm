<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelayankegiatan extends Model
{
    //
    protected $table = 'kegiatanpelayan';
   	protected $primaryKey = 'id';
   	protected $fillable  = [
	'idkegiatan',
	'idpersonal',
	'melayani',	
	'active',
	'usercreated',
	'userupdated',
	'hadir',
	'alasan'];

	public function kegiatan()
	{
		return $this->belongsTo('App\Kegiatan','idkegiatan','id');
	}
	public function personal()
    {
        return $this->belongsTo('App\Personal','idpersonal','idpersonal');
    }
}
