<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bpnkehadiran extends Model
{
    //
    protected $table = 'bpn_kehadiran';
    protected $primaryKey = 'id';
    protected $fillable= [
	'tanggal',
	'idmateri',
	'idguru',
	'usercreated',
	'userupdated',
	'status',
    'idpeserta'
    ];
	public function materi()
    {
    	return $this->belongsTo('App\Bpnmateri','idmateri','id');
    }
    public function guru()
    {
    	return $this->belongsTo('App\Bpnguru','idguru','id');
    }
    public function peserta()
    {
        return $this->belongsTo('App\Bpnpeserta','idpeserta','id');
    }
}