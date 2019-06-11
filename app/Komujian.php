<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Komujian extends Model
{
    //
    protected $table = 'kk_ujian';
    protected $primaryKey = 'id';
    protected $fillable= [
	'idkelaskom',
	'tanggal',
	'nilai',
	'idmurid',
	'usercreated',
	'userupdated',
	'active'
    ];

    public function kelaskom()
    {
    	return $this->belongsTo('App\Kelaskom','idkelaskom','id');
    }
    public function murid()
    {
    	return $this->belongsTo('App\Murid','idmurid','id');
    }
}
