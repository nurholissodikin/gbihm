<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ibadahrayapelayan extends Model
{
    //
    protected $table = 'ibadahraya_pelayan';
   	protected $primaryKey = 'id';
   	protected $fillable  = [
	'idibadahraya',
	'idpersonal',
	'melayani',	
	'active',
	'usercreated',
	'userupdated',
	'hadir',
	'alasan'];

	public function ibadahraya()
	{
		return $this->belongsTo('App\Ibadahraya','idibadahraya','id');
	}
	public function personal()
    {
        return $this->belongsTo('App\Personal','idpersonal','idpersonal');
    }
}
