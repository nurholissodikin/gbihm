<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kommagang extends Model
{
    //
    protected $table = 'kk_magang';
    protected $primaryKey = 'id';
    protected $fillable= [
	'idkelaskom',
	'idmurid',
	'magang',
    'pelayanan',
	'tanggal',
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
