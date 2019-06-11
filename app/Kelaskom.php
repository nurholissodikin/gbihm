<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelaskom extends Model
{
    //
    protected $table = 'kelas_kom';
    protected $primaryKey = 'id';
    protected $fillable = [
    'idrayon',
	'kom_seri',
	'angkatan',
	'tgl_mulai',
	'periode_m',
	'periode',
	'usercreated',
	'userupdated'
    ];

     public function rayon()
    {
    	return $this->belongsTo('App\Rayon','idrayon','idrayon');
    }
    public function murid()
    {
    	return $this->hasMany('App\Murid','idkelaskom','id');
    }
    public function komkehadiran()
    {
        return $this->hasMany('App\Komkehadiran','idkelaskom','id');
    }
    public function komlkp()
    {
        return $this->hasMany('App\Komlkp','idkelaskom','id');
    }
    public function komujian()
    {
        return $this->hasMany('App\Komujian','idkelaskom','id');
    }
    public function kommagang()
    {
        return $this->hasMany('App\Kommagang','idkelaskom','id');
    }
    public function komtugas()
    {
        return $this->hasMany('App\Komtugas','idkelaskom','id');
    }
    public function kkmta()
    {
        return $this->hasMany('App\Kkmta','idkelaskom','id');
    }
}
