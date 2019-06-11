<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bpnkonseling extends Model
{
    //
    protected $table = 'bpn_konseling';
    protected $primaryKey = 'id';
    protected $fillable= [
	'tanggal',
	'tempat',
	'idpeserta',
	'pejabat',
	'usercreated',
	'userupdated',
	'status'
    ];
	public function peserta()
    {
    	return $this->belongsTo('App\Bpnpeserta','idpeserta','id');
    }
}
