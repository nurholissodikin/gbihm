<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bpncalonguru extends Model
{
    //
    protected $table = 'bpn_calon_guru';
    protected $primaryKey = 'id';
    protected $fillable= [
	'idpersonal',
	'jenis_jabatan',
	'nosertifikat',
	'angkatan',
	'keterangan',
	'usercreated',
	'userupdated',
	'status'
    ];

    public function personal(){
    	return $this->belongsTo('App\Personal','idpersonal','idpersonal');
    }
}
