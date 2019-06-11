<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bpnpeserta extends Model
{
    //
    protected $table = 'bpn_peserta';
    protected $primaryKey = 'id';
    protected $casts = ['kategori' => 'array'];
    protected $fillable= [
	'idpria',
	'idwanita',
	'nosertifikat',
	'angkatan',
	'kategori',
	'usercreated',
	'userupdated',
	'status'
    ];
	public function pria()
    {
    	return $this->belongsTo('App\Personal','idpria','idpersonal');
    }
    public function wanita()
    {
    	return $this->belongsTo('App\Personal','idwanita','idpersonal');
    }
    public function konseling()
    {
    	return $this->hasMany('App\Bpnkonseling','idpeserta','id');
    } 
    public function kehadiran()
    {
        return $this->hasMany('App\Bpnkehadiran','idpeserta','id');
    } 
}
