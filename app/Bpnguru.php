<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bpnguru extends Model
{
    //
    protected $table = 'bpn_guru';
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
     public function kehadiran(){
    	return $this->hasMany('App\Bpnkehadiran','idguru','id');
    }
}
