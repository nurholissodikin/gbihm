<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelayanan extends Model
{
    //
   	protected $table = 'pelayanan';
   	protected $primaryKey = 'id';
   	protected $fillable  = [
	'nosertifikat',
	'sejak',	
	'jenisbadge',
	'idpersonal',
	'dokumen',
	'mengetahui',
	'menyutujui',
	'usercreated',
	'userupdated',];

	public function personal()
	{
		return $this->belongsTo('App\Personal','idpersonal','idpersonal');
	}
	public function jabatanpelayanan()
    {
        return $this->hasMany('App\Jabatanpelayanan','idpersonal','id');
    }
}
