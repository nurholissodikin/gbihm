<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Murid extends Model
{
    //
    protected $table = 'murid';
    protected $primaryKey = 'id';
    protected $casts = ['kategori_peserta' => 'array'];
    protected $fillable= [
	'kategori_peserta',
	'idpersonal',
	'nosertifikat',
	'angkatan',
	'idkktma',
	'usercreated',
	'userupdated',
	'active',
    'idkelaskom'
    ];

    public function personal()
    {
    	return $this->belongsTo('App\Personal','idpersonal','idpersonal');
    }
    public function kkmta()
    {
    	return $this->belongsTo('App\Kkmta','idkktma','id');
    }
     public function kelaskom()
    {
        return $this->belongsTo('App\Kelaskom','idkelaskom','id');
    }
    public function kk_absensi_kehadiran()
    {
        return $this->hasMany('App\Komkehadiran','idmurid','id');
    }
    public function komujian()
    {
        return $this->hasMany('App\Komujian','idmurid','id');
    }
    public function kommagang()
    {
        return $this->hasMany('App\Kommagang','idmurid','id');
    }
    public function komtugas()
    {
        return $this->hasMany('App\Komtugas','idmurid','id');
    }
    public function makalah()
    {
        return $this->hasMany('App\Kkmta','idmurid','id');
    }
}
