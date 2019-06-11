<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pesertakegiatan extends Model
{
    //
    protected $table = 'kegiatan_peserta';
   	protected $primaryKey = 'id';
   	protected $fillable  = [
	'idkegiatan',
	'idpeserta',
	'hadir',
	'alasan',
	'active',
	'usercreated',
	'userupdated'];

	public function kegiatan()
	{
		return $this->belongsTo('App\Kegiatan','idkegiatan','id');
	}
	public function personal()
    {
        return $this->belongsTo('App\Personal','idpeserta','idpersonal');
    }
}
