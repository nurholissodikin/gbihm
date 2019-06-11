<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kkmta extends Model
{
    //
    protected $table = 'kk_mta';
    protected $primaryKey = 'id';
    protected $fillable= [
	'idkelaskom',
	'idmurid',
	'makalah',
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
        return $this->hasMany('App\Murid','idmurid','id');
    }
}
